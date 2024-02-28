<?php

namespace Tests\Feature\Notifications\Webhooks;

use App\Events\CheckoutableCheckedOut;
use App\Models\Accessory;
use App\Models\Asset;
use App\Models\Component;
use App\Models\Consumable;
use App\Models\LicenseSeat;
use App\Models\Location;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\CheckoutAccessoryNotification;
use App\Notifications\CheckoutAssetNotification;
use App\Notifications\CheckoutConsumableNotification;
use App\Notifications\CheckoutLicenseSeatNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Support\Facades\Notification;
use Tests\Support\InteractsWithSettings;
use Tests\TestCase;

class SlackNotificationsUponCheckoutTest extends TestCase
{
    use InteractsWithSettings;

    protected function setUp(): void
    {
        parent::setUp();

        Notification::fake();
    }

    public function assetCheckoutTargets(): array
    {
        return [
            'Asset checked out to user' => [fn() => User::factory()->create()],
            'Asset checked out to asset' => [fn() => Asset::factory()->laptopMbp()->create()],
            'Asset checked out to location' => [fn() => Location::factory()->create()],
        ];
    }

    public function licenseCheckoutTargets(): array
    {
        return [
            'License checked out to user' => [fn() => User::factory()->create()],
            'License checked out to asset' => [fn() => Asset::factory()->laptopMbp()->create()],
        ];
    }

    public function testAccessoryCheckoutSendsSlackNotificationWhenSettingEnabled()
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckOutEvent(
            Accessory::factory()->appleBtKeyboard()->create(),
            User::factory()->create(),
        );

        $this->assertSlackNotificationSent(CheckoutAccessoryNotification::class);
    }

    public function testAccessoryCheckoutDoesNotSendSlackNotificationWhenSettingDisabled()
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckOutEvent(
            Accessory::factory()->appleBtKeyboard()->create(),
            User::factory()->create(),
        );

        $this->assertNoSlackNotificationSent(CheckoutAccessoryNotification::class);
    }

    /** @dataProvider assetCheckoutTargets */
    public function testAssetCheckoutSendsSlackNotificationWhenSettingEnabled($checkoutTarget)
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckOutEvent(
            Asset::factory()->laptopMbp()->create(),
            $checkoutTarget(),
        );

        $this->assertSlackNotificationSent(CheckoutAssetNotification::class);
    }

    /** @dataProvider assetCheckoutTargets */
    public function testAssetCheckoutDoesNotSendSlackNotificationWhenSettingDisabled($checkoutTarget)
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckOutEvent(
            Asset::factory()->laptopMbp()->create(),
            $checkoutTarget(),
        );

        $this->assertNoSlackNotificationSent(CheckoutAssetNotification::class);
    }

    public function testComponentCheckoutDoesNotSendSlackNotification()
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckOutEvent(
            Component::factory()->ramCrucial8()->create(),
            Asset::factory()->laptopMbp()->create(),
        );

        Notification::assertNothingSent();
    }

    public function testConsumableCheckoutSendsSlackNotificationWhenSettingEnabled()
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckOutEvent(
            Consumable::factory()->cardstock()->create(),
            User::factory()->create(),
        );

        $this->assertSlackNotificationSent(CheckoutConsumableNotification::class);
    }

    public function testConsumableCheckoutDoesNotSendSlackNotificationWhenSettingDisabled()
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckOutEvent(
            Consumable::factory()->cardstock()->create(),
            User::factory()->create(),
        );

        $this->assertNoSlackNotificationSent(CheckoutConsumableNotification::class);
    }

    /** @dataProvider licenseCheckoutTargets */
    public function testLicenseCheckoutSendsSlackNotificationWhenSettingEnabled($checkoutTarget)
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckOutEvent(
            LicenseSeat::factory()->create(),
            $checkoutTarget(),
        );

        $this->assertSlackNotificationSent(CheckoutLicenseSeatNotification::class);
    }

    /** @dataProvider licenseCheckoutTargets */
    public function testLicenseCheckoutDoesNotSendSlackNotificationWhenSettingDisabled($checkoutTarget)
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckOutEvent(
            LicenseSeat::factory()->create(),
            $checkoutTarget(),
        );

        $this->assertNoSlackNotificationSent(CheckoutLicenseSeatNotification::class);
    }

    private function fireCheckOutEvent(Model $checkoutable, Model $target)
    {
        event(new CheckoutableCheckedOut(
            $checkoutable,
            $target,
            User::factory()->superuser()->create(),
            '',
        ));
    }

    private function assertSlackNotificationSent(string $notificationClass)
    {
        Notification::assertSentTo(
            new AnonymousNotifiable,
            $notificationClass,
            function ($notification, $channels, $notifiable) {
                return $notifiable->routes['slack'] === Setting::getSettings()->webhook_endpoint;
            }
        );
    }

    private function assertNoSlackNotificationSent(string $notificationClass)
    {
        Notification::assertNotSentTo(new AnonymousNotifiable, $notificationClass);
    }
}

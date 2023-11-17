<?php

namespace App\Http\Controllers\Api;

use App\Actions\Payment\Paypal\CreatePayment;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Throwable;

// Requests
use App\Http\Requests\Payment\Paypal\ProcessRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PayPalController extends BaseApiController
{
    /**
     * @param ProcessRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function process(ProcessRequest $request): RedirectResponse
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $request->currency ?? "USD",
                        "value" => $request->sum
                    ]
                ]
            ]
        ]);

        if (! isset($array['error'])) {
            $response['sum'] = $request->sum;
            $payment = CreatePayment::run($response);

            if (! empty($payment) && ! empty($response['id'])) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('paypal.cancel')
                    ->with('message', 'Something went wrong.');
            }
        }

        return redirect()
            ->route('paypal.cancel')
            ->with('message', $response['message'] ?? 'Something went wrong.');
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function success(Request $request): RedirectResponse
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            return redirect()
                ->route('prayers.index')
                ->with('message', 'Transaction complete.');
        }

        return redirect()
            ->route('prayers.index')
            ->with('message', $response['message'] ?? 'Something went wrong.');

    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function cancel(Request $request): RedirectResponse
    {
        return redirect()
            ->route('prayers.index')
            ->with('message', $response['message'] ?? 'You have canceled the transaction.');
    }

}

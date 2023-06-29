    <div>
        <!-- Replace "test" with your own sandbox Business account app client ID -->
        <script
            src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}">
        </script>
        <!-- Set up a container element for the button -->
        <div class="container-fluid text-center p-5">
            <h1 class="p-5">¡Realiza tu pago!</h1>
            <div id="paypal-button-container"></div>
        </div>
    <script>
        window.addEventListener('load' , ()=>{

            paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'pill',
                    label: 'pay'
                },
    
                createOrder(data, actions) {
                    return actions.order.create({
                        application_context: {
                            shipping_preference: "NO_SHIPPING"
                        },
                        payer: {
                            name: {
                                given_name: "John",
                                surname: "Doe"
                            },
                            "address": {
                                "postal_code": "95131",
                                "country_code": "MX"
                            }
                        },
                        purchase_units: [{
                            amount: {
                                value: 100
                            },
                        }],
                    });
                },
    
    
                // Finalize the transaction on the server after payer approval
                onApprove(data, actions) {
                    actions.order.capture()
                        .then(function(detalles) {
                            return fetch("api/payment/process/" + data.orderID, {
                                method: 'POST',
                                headers: {
                                    'content-type': 'aplication/json'
                                },
                                body: JSON.stringify({
                                    detalles: detalles,
                                })
                            })
                        })
                },
                //If the transaction is canceled
                onCancel(data) {
                    alert("PAGO CANCELADO");
                    console.log(data);
                },
    
    
            }).render('#paypal-button-container');
        });
    </script>
    </div>

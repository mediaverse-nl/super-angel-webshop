@component('mail::message')
    <table id="templateContainer" width="500px;" style="width: 550px !important; padding: 15px; margin: auto auto; border: 1px solid #dddddd;">

        <tbody>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellspacing="0" width="100%" id="templateBody">
                        <tbody>
                        <tr>
                            <td valign="center" class="bodyContent">
                                Fundoe.nl
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td align="center" valign="top" cellpadding="25">
                    <table border="0" cellspacing="0" width="100%" id="templateBody">
                        <tbody>
                        <tr>
                            <td valign="top" class="bodyContent">
                                {!! Editor('mail_order_confirmation', 'richtext', false,
                                    'Beste @naam, We hebben uw bestelling ontvangen en deze wordt verwerkt. De bestelgegevens zijn als volgt:

                                    Bestelnummer: # @order_number
                                    Totaal vandaag verschuldigd: € @total_paid
                                    U ontvangt een e-mail van ons zodra uw bestelling is verzonden. Vermeld het referentienummer van uw bestelling als u contact met ons wilt opnemen over deze bestelling. betaald op: @paid_at

                                    ---

                                    Met vriendelijke groet,
                                    Martje',
                                    [
                                        'mentions'=>[
                                            'order_number' => $order->id,
                                            'name' => $order->name,
                                            'total_paid' => $order->total_paid,
                                            'paid_at' => $order->updated_at,
                                        ]
                                    ])
                                !!}

                                </p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter">
                        <tbody>
                        <tr>
                            <td valign="top" class="footerContent">
                                <a href="https://www.tantemartje.com/contact" target="_blank" rel="noreferrer">contact</a>
                                <span class="hide-mobile"> | </span>
                                Copyright © <a href="https://www.tantemartje.nl">tantemartje.nl</a>, All rights reserved.
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
@endcomponent
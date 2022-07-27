<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <title>Votre commande a été validé</title>
</head>
<style>
	li{
		list-style: circle; 	
	}
</style>

<!-- LIEN MIROIR -->
<body style="padding:0; margin:0; font-family:Noto Sans"><img style="border:0" src="" width="1" height="1">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td align="center" bgcolor="#FFFFFF">
					<table class="w680" width="680" cellpadding="0" cellspacing="0" border="0">
						<tbody>
							<tr>
                                <td>
                                    <table class="full" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td height="40px"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="full" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <table class="full" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="background: lightblue">
                                                                                    <h1 style="font-weight:600; font-size: 1.5rem;margin-top: 15px; padding: 1rem; background-color:lightblue; margin:auto 0; text-align:center">
																						Merci {{$user->name}} pour votre achat</h1>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="font-size: 1.2rem;margin-top: 15px;font-weight: 500; padding: .2rem; display: inline-block; margin-bottom: 0; text-align:center">
                                                                                        Voici votre liste d'achat
                                                                                    </p>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                <ul style="font-family: ''Noto Sans'', Arial, Helvetica, sans-serif; font-size: 16px; mso-height-rule: exactly; line-height: 28px; color: #777777; font-weight: 400; margin-bottom: 20px; padding-left:4rem;">
                                                                                    @php
                                                                                            $TotalQuantity = 0;
                                                                                            $TotalPrice = 0;

                                                                                        @endphp
                                                                                        @foreach($order->items as $item)
                                                                                            @php
                                                                                                $TotalQuantity += $item->pivot->quantity;
                                                                                                $TotalPrice += $item->price * $item->pivot->quantity;
                                                                                            @endphp
                                                                                            <li><span style="font-weight: 600;"> {{$item->pivot->quantity}}</span> {{$item->name}} :  {{$item->pivot->quantity * $item->price}}€</li>
                                                                                        @endforeach                        
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <p style="font-size: 1.2rem;margin-top: 15px;font-weight: 500; padding: .2rem; display: inline-block; margin-bottom: 0; text-align:center">
                                                                                        Pour un total de <span style="font-weight: 700; font-size: 1.5rem">{{ $TotalPrice }}€</span>
                                                                                    </p>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td>
                                                                                    <center>
                                                                                        <a href="https://www.laposte.fr/colissimo" style="margin:auto 0; " > 
                                                                                            <img src="https://www.shoppei.fr/wp-content/uploads/2020/09/giphy.gif" alt="" style="width: 25%; margin: auto;">
                                                                                        </a>
                                                                                    </center>
                                                                                    <center>
                                                                                        <p style="font-size: 1rem;margin-top: 15px;font-weight: 500; padding: .2rem; text-transform: uppercase; display: inline-block; margin-bottom: 0; text-align:center; width:100%"> Votre délais de livraison est de 2 jours
                                                                                        </p>
                                                                                    </center>
                                                                                </td>

                                                                                
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td width="40px"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="40px"></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
						
						
							<tr class="Footer">
								<td style="background: lightblue;">
										
                                            <table class="w680" width="680" cellpadding="0" cellspacing="0" border="0">	
												<tbody><tr><td bgcolor="#FFA02F">
													<table class="w680" width="680" cellpadding="0" cellspacing="0" border="0">
														<tbody>
															<tr>
															
															</tr>
														</tbody>
													</table>
												</td>
									</tr></tbody></table>
                                          <div style="background:lightblue;"><center>
                                            <p style="font-size: 12px; width: 80%; text-align: center;text-transform:uppercase; font-weight: 400;color:#4B4B4B; padding-top: 1rem;">
                                                Ce kit mail a été réalisé pour le devoir de rattrapage de Laravel.
                                            </p>
                                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" style="font-size: 12px; width: 80%; text-align: center;text-transform:uppercase; font-weight: 400;color:#4B4B4B; padding-top: 1rem; padding-bottom: 1rem">
												ne pas cliquer
                                            </a>
                                          </center>
                                        </div>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
			</tr>

		</tbody>
	</table>
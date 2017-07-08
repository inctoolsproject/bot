<?php
require_once('./line_class.php');
$channelAccessToken = '1Rf9o5Fs3y0iKo/BONDWhNHZ3gg/0+ctx9dOZM2rJssSWOxbE0pRJuEPZ+rWZV5O/fHFu5CXhruwPrvdtRTrRug7iFzqV3oqfRiczem+glFKBmE2zFYiQ7VDihUX76qLXdPTK1v56WguGC0KL4is7AdB04t89/1O/w1cDnyilFU='; //channel access token here
$channelSecret = 'd46265cb4ee80637d65a9c810091616b';//channel secret here
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
$userId 	= $client->parseEvents()[0]['source']['userId'];
$replyToken = $client->parseEvents()[0]['replyToken'];
$timestamp	= $client->parseEvents()[0]['timestamp'];
$message 	= $client->parseEvents()[0]['message'];
$messageid 	= $client->parseEvents()[0]['message']['id'];
$type 	= $client->parseEvents()[0]['type'];
$profil = $client->profil($userId);
$pesan_datang = $message['text'];
   
if($type=='join'){
			$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Hi All... i am ßόţ Ćhat Created by Ŵ1ΠĻĨДΠ ĆĻÙВ'
									)
							)
						);
}
else if($pesan_datang=='1')
	{
		$get_sub = array();
		$aa =   array(
						'type' => 'image',									
						'originalContentUrl' => 'https://medantechno.com/line/images/bolt/1000.jpg',
						'previewImageUrl' => 'https://medantechno.com/line/images/bolt/240.jpg'	
						
					);
		array_push($get_sub,$aa);	
		$get_sub[] = array(
									'type' => 'text',									
									'text' => 'Halo '.$profil->displayName.', Anda memilih menu 1'
								);
		
		$balas = array(
					'replyToken' 	=> $replyToken,														
					'messages' 		=> $get_sub
				 );	
		/*
		$alt = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Anda memilih menu 2, harusnya gambar muncul.'
									)
							)
						);
		*/
		//$client->replyMessage($alt);
	}

else
	if($pesan_datang=='6')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'location',					
										'title' => 'Lokasi Saya.. Klik Detail',					
										'address' => 'Medan',					
										'latitude' => '3.521892',					
										'longitude' => '98.623596' 
									)
							)
						);
				
	}
else if($message['type']=='sticker')
{	
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',									
										'text' => 'Terimakasih stikernya sob'										
									
									)
							)
						);
						
}
else if($pesan_datang=='jam')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Jam Server Saya : '. date('Y-m-d H:i:s')
									)
							)
						);
				
	}

else
	if($pesan_datang=='testing')
	{
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Testing PUSH pesan ke anda'
									)
							)
						);
						
		$push = array(
							'to' => $userId,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Pesan ini dari medantechno.com'
									)
							)
						);
						
		
		$client->pushMessage($push);
				
	}
else
	if($pesan_datang=='on')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'siri:on'
									)
							)
						);
				
	}
else
	if($pesan_datang=='lock')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'set:ownerlock:on'
									)
							)
						);
				
	}
$result =  json_encode($balas);
file_put_contents('./balasan.json',$result);
$client->replyMessage($balas);
?>

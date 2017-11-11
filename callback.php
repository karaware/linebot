<?php
/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
require_once('./LINEBotTiny.php');
$channelAccessToken = 'v4cBItBMARZ8bgHpQnUzmoN0OJ1lzkHVcrpgVc12nUDSPEm4CMDEOodjX1WWwBTD1f4URa9tK4oF/pjkr2e+Yt6997sW3+52urgGRr/uD6ppF74UiX8CTlapaYquBjwK1rHggEaxl7jI4o8CYPiSowdB04t89/1O/w1cDnyilFU=';
$channelSecret = '2672b7b6eaf276e02e5dd758c06eed95';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
/**                case 'text':
*                    $client->replyMessage(array(
*                        'replyToken' => $event['replyToken'],
*                        'messages' => array(
*                            array(
*                                'type' => 'text',
*                                'text' => $message['text']
*                            )
*                        )
*/
//add20170628
                        case 'text':
                            if(strpos($message['text'],'んだ') !== false ){
                                $rep = "そうなんだ〜";

                            } else if(strpos($message['text'],'おはよう') !== false ){
                                $rep = "おはよう！";

                            } else if(strpos($message['text'],'！') !== false ){
                                $rep = "すごいね！";

                            } else if(strpos($message['text'],'でさ') !== false ){
                                $rep = "それでそれで？";

                            } else if(strpos($message['text'],'番号') !== false ){
				$rep = "0783278010";
				
			    } else if(strpos($message['text'],'位置') !== false ){
				$location = "位置";

                            } else {
                                $rep = "なるほど";
                            }


			    if(isset($location)){
				$client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
				'type' => 'location',
				'title' => '位置情報を示します。タップしてみてください。',
				'address' => '〒150-0002 東京都渋谷区渋谷２丁目２１−１',
				'latitude' => 35.65910807942215,
				'longitude' => 139.70372892916203
				)
				)
				)
				);
			    } else {
                            $client->replyMessage(array(
                                'replyToken' => $event['replyToken'],
                                'messages' => array(
                                    array(
                                        'type' => 'text',
                                        'text' => $rep
                                    )
                                )
			    )
                    	    );
			    }
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};


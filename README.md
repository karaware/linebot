# linebot
##概要
LINEbot「tns」がメッセージを受け取った時に返答内容を問い合わせる先のファイルです。
以下を参考にして作成しました。
https://persol-tech-s.co.jp/i-engineer/interesting/numadumari11
##ファイル説明
1. callback.php
tnsが受け取ったメッセージを元に返答内容を作成する
以下から取得して一部を修正したもの
https://github.com/line/line-bot-sdk-php/blob/master/line-bot-sdk-tiny/echo_bot.php

2. LINEBotTiny.php
LINEとのやりとりをする
以下から取得してそのまま使用
https://github.com/line/line-bot-sdk-php/blob/master/line-bot-sdk-tiny/LINEBotTiny.php

3. README.md
これ

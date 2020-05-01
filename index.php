<?php


set_time_limit(0);

ob_start();

include("jdf.php");

$API_KEY = '1111497043:AAFfeF6vMDCbVpBD6hhX6dXtcsYrMHPVuis';
##------------------------------##
define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function sendmessage($chat_id, $text)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => "MarkDown"
    ]);
}

function deletemessage($chat_id, $message_id)
{
    bot('deletemessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
    ]);
}

function sendaction($chat_id, $action)
{
    bot('sendchataction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

function sendphoto($chat_id, $photo, $action)
{
    bot('sendphoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'action' => $action
    ]);
}

function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}


//====================teamphonix======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$ADMIN = 1139073652;
$bot = "KinoPMBot";
$channel = file_get_contents("data/channel.txt");
$channe2l = file_get_contents("data/channel2.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$fatime = date('H:i', strtotime('2 hour'));
$fadate = date('d-M Y',strtotime('2 hour'));
//====================teamphonix======================//

$join = file_get_contents("https://api.telegram.org/bot1111497043:AAFfeF6vMDCbVpBD6hhX6dXtcsYrMHPVuis/getChatMember?chat_id=@KINOUNIVERSE&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"👋┇ Salom bot xush kelibsiz

🌟┇ Botdan foydalanish uchun kanalimizga a'zo boling

📡┇Kanalimiz
@KINOUNIVERSE👈
👆👆👆

📌┇ A'zo bolib /start ni bosin " ,
   
]);return false;}



$ptn = json_encode([
    'inline_keyboard' => [
        [
            ['text' => "1⃣", 'callback_data' => "c1"], ['text' => "2⃣", 'callback_data' => "c2"], ['text' => "3⃣", 'callback_data' => "c3"]
        ],
        [
            ['text' => "4⃣", 'callback_data' => "c4"], ['text' => "5⃣", 'callback_data' => "c5"], ['text' => "6⃣", 'callback_data' => "c6"]
        ],
        [
            ['text' => "7⃣", 'callback_data' => "c7"], ['text' => "8⃣", 'callback_data' => "c8"], ['text' => "9⃣", 'callback_data' => "c9"]
        ],
        [
            ['text' => "Tasdiqlash✅", 'callback_data' => "chk"], ['text' => "0⃣", 'callback_data' => "c0"]
        ],
        [
            ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
        ],
    ]
]);
////_________
if ($text == "/start") {

        $user = file_get_contents('users.txt');
        $members = explode("n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "n";
            file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/shoklat.txt", "10");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "*👋Salom dostim (tashrifingiz uchun rahmat) 
            
Siz ushbu botda kanalingiz postni osongina oshirish uchun ushbu botdan foydalanishingiz mumkin

Botni kanalizga admin qiling bumasa ishlamidi

Ishni boshlash uchun quyidagi variantlardan birini tanlang*",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Ball yig'ish💰", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "Referal📲", 'callback_data' => "b"], ['text' => " Kabinet👤", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "Zakas qilish📝", 'callback_data' => "e"], ['text' => "📤Tanga sovg'a qilish", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "Dokon🛍", 'callback_data' => "f"], ['text' => "Yordam🤖", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => " Kuzatuv Buyurtma🔎", 'callback_data' => "h"], ['text' => "Sovg'a kodi🎁", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    
                ]
            ])
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "Hey, azizim, biz serverni to'sib qo'ydik, yana xabarlar yo'q");
    } elseif (strpos($text, '/start') !== false && $forward_chat_username == null) {
        $newid = str_replace("/start ", "", $text);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "Sizning havolangizga kira olmaysiz!",
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($chat_id, "Siz allaqachon ushbu botga azo bo'lgansiz va a'zolik aloqangiz bilan bot a'zosi bo'la 😑 ");
        } else {
            sendAction($chat_id, 'typing');
            @$sho = file_get_contents("data/$newid/shoklat.txt");
$ran = rand(5, 20);
            $getsho = $sho + $ran;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "n";
                file_put_contents("data/$chat_id/membrs.txt", "0");
                file_put_contents("data/$chat_id/shoklat.txt", "10");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/ali.txt", "No");
            sendmessage($chat_id, "تبریک دوست عزیز شما با دعوت کاربر $newid عضو این ربات شده اید😃");
            bot('sendmessage', [
                'chat_id' => $chat_id,
          'text' => "*👋Salom dostim (tashrifingiz uchun rahmat) 
            
Siz ushbu botda kanalingiz postni osongina oshirish uchun ushbu botdan foydalanishingiz mumkin

Botni kanalizga admin qiling bumasa ishlamidi

Ishni boshlash uchun quyidagi variantlardan birini tanlang*",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Ball yig'ish💰", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "Referal📲", 'callback_data' => "b"], ['text' => " Kabinet👤", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "Zakas qilish📝", 'callback_data' => "e"], ['text' => "📤Tanga sovg'a qilish", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "Dokon🛍", 'callback_data' => "f"], ['text' => "Yordam🤖", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => " Kuzatuv Buyurtma🔎", 'callback_data' => "h"], ['text' => "Sovg'a kodi🎁", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    ]
                ])
            ]);
            SendMessage($newid, "Tabriklaymiz, hozir sizning maxsus havolangizga bir kishi botga kirdi😇

Sizda 10 bepul tanga bor. ");
        }
    }
    elseif ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Bosh menyuga qaytingiz",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "no");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "
*Asosiy menyuga qaytardingiz
🔻Quyidagi variantlardan birini tanlang*🔻
",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Ball yig'ish💰", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "Referal📲", 'callback_data' => "b"], ['text' => " Kabinet👤", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "Zakas qilish📝", 'callback_data' => "e"], ['text' => "📤Tanga sovg'a qilish", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "Dokon🛍", 'callback_data' => "f"], ['text' => "Yordam🤖", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => " Kuzatuv Buyurtma🔎", 'callback_data' => "h"], ['text' => "Sovg'a kodi🎁", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "a") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Ball yigish bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Ball yig'ish bo'limiga xush kelibsiz


Bu erda kanalimizga tashrif buyurib, har bir postning ostidagi `Pul` tugmasini bosish orqali pul topishingiz mumkin.
Kanaldagi faoliyatingiz robot bilan birlashtirilgan bo'lib, sizning hisobingizga robotda darhol kirish pullari yuboriladi.
Ko'rsatilgan reklamalar kanaliga kirish uchun quyidagi  (Kanalga Kirish tugmasi)  bosishingiz mumkin ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "👁‍🗨Kanalga kirish", 'url' => "https://t.me/KinoPM"]
                    ],
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "k") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Sovg'a kodi bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Quyidagi klaviatura yordamida pulni oshirish uchun kanalga yuborilgan kodni yuboring
Keyin (Tasdiqlash) tugmasini bosing, ",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c1") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "1");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c2") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "2");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c3") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "3");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c4") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "4");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c5") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "5");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c6") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "6");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c7") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "7");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c8") {
        $fromm_id = $update->inline_query->from->id;
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "8");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c9") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "9");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c0") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "0");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kiritilgan kod:
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "chk") {
        $fromm_id = $update->inline_query->from->id;
        $cod = file_get_contents("cod/$chatid.txt");
        $code2 = file_get_contents("data/code2.txt");
        if ($cod == $code && $cod != null) {
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $getsho = $sho + $code2;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            unlink("cod/$chatid.txt");
            file_put_contents("data/code.txt", "");
            file_put_contents("data/code2.txt", "");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Sovg'a kodi bilan tabriklaysiz, 
        $code2 kodidan olingan tangalar soni  ",
                'show_alert' => true
            ]);
            bot('sendMessage', [
                'chat_id' => $channel2,
                'text' => "$codi kodi o'chirib qo'yildi
 
 By: 👇
🆔: $chatid
 
Soat: $fatime

  ",

            ]);
            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
*Asosiy menyuga qaytardingiz
🔻Quyidagi variantlardan birini tanlang*🔻
",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "Ball yig'ish💰", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "Referal📲", 'callback_data' => "b"], ['text' => " Kabinet👤", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "Zakas qilish📝", 'callback_data' => "e"], ['text' => "📤Tanga sovg'a qilish", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "Dokon🛍", 'callback_data' => "f"], ['text' => "Yordam🤖", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => " Kuzatuv Buyurtma🔎", 'callback_data' => "h"], ['text' => "Sovg'a kodi🎁", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    ]
                ])
            ]);
        } else {
            unlink("cod/$chatid.txt");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Kiritilgan kod to'g'ri emas yoki allaqachon ishlatilgan🖤",
                'show_alert' => true
            ]);
            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
*Asosiy menyuga qaytardingiz
🔻Quyidagi variantlardan birini tanlang*🔻
",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "Ball yig'ish💰", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "Referal📲", 'callback_data' => "b"], ['text' => " Kabinet👤", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "Zakas qilish📝", 'callback_data' => "e"], ['text' => "📤Tanga sovg'a qilish", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "Dokon🛍", 'callback_data' => "f"], ['text' => "Yordam🤖", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => " Kuzatuv Buyurtma🔎", 'callback_data' => "h"], ['text' => "Sovg'a kodi🎁", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "💰Kunlik bonus💰", 'callback_data' => "j"]
                    ],
                    ]
                ])
            ]);
        }
    } elseif ($data == "b") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Referal bolimidasiz",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Prosmotorni oshiring

Kanalingizda postlarni kam korilishidan charchadingizmi?

Odamlar sizning kanalingiz aktiv ekanligini biladimi?

Kanalingizdagi postlar prosmotrni kotarishni xohlaysizmi? ✫😱

Siz bular uchun tayyormisiz? 😋❤️


prosmotr kuchaytirish uchun botga qo'shiling
Pullaringizni to'plang va kanal prosmotrini oshiring♥ ️

http://telegram.me/$bot?start=$chatid ",
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Salom aziz do'stim, quyidagi bo'limga xush kelibsiz

Siz do'stlaringizni botga taklif qilinga va 
Bepul 10ta tangani oling

tepadagi habarni dostingizga yuboring ♥",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "j") {
        date_default_timezone_set('Asia/Tehran');
        $date = date('Ymd');
        @$gettime = file_get_contents("data/$chatid/dates.txt");
        if ($gettime == $date) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "💢Siz kunlik tanga olgansiz, ertaga qadar kuting♻️",
                'show_alert' => true
            ]);
        } else {
            file_put_contents("data/$chatid/dates.txt", $date);
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $ran = rand(10, 30);
            $getsho = $sho + $ran;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            $sho2 = file_get_contents("data/$chatid/shoklat.txt");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => " Sizga $ran  pul qo'shildi❤️",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "f") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Do'konga xush kelibsiz!

Tanga sotib olish uchun 👇Sotib olish👇 ga murojat qiling ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💰Sotib olish", 'url' => "https://t.me/SystemUz"]
                    ],
                    [
                        
                    ],
                    [
                        
                    ],
                        [
                        
                    ],
                    [
                        
                    ],
                ]
            ])
        ]);
    } elseif ($data == "c") {
        @$sho = file_get_contents("data/$chatid/shoklat.txt");
        @$sea = file_get_contents("data/$chatid/membrs.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "
        
🆔Raqamingiz: $chatid
   💰Hisobingiz: $sho
    Obunangiz: $sea",
            'show_alert' => true
        ]);
    } elseif ($data == "g") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Yordam bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessageText', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Variantlardan birini tanlang",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
               [['text' => "📖Qollanma", 'callback_data' => "qol"], ['text' => "Qoida📝", 'callback_data' => "pus"]],
[['text' => "🏚Bosh menyu",'callback_data' => "home"]],
                ]
            ])
        ]);
    }elseif ($data == "qol") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "🔖Yordam bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Siz bu bot orqali kanalingiz postlarini korish sifatini oshirishingiz mumkun

Buning uchun `Ball ishlash💰` ga bosing va bot kanaliga kiring
Bot kanalidagi har bir post tagidagi `💰Ball olish💰` tugmasini bosib ball yiging

Xisobingiz prosmotir yigish ballari hisobiga yetsa postingizni kanalimizga joylay olasiz

Post joylash uchun `Zakas qilish📝` tugmasini bosing va ozingizga keraklisini tanlang va kanalinigizga oyib birorta postni Forword qilib yuborin

Bizda 💰Kunlik bonus💰 ham mavjud har kuni bir marotaba tasodifiy bonis beriladi qancha berishi omadingizga qarab😇

Bizda ozingizni hisobingizni dostingizga sovga qilishingiz ham mumkun buning uchun `📤Tanga sovg'a qilish` ni bosing va dostingiz ID raqamini yuboring  ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Qoida📝", 'callback_data' => "pus"]
                    ],
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "pus") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "📝Qoida bolimidasiz",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Bizning talab va shatlrtlarimiz bilan tanishib chiqing

1⃣ Har xil Diniy Siyosiy postlarni tashlash mumkun emas

2⃣ Pornografik videolar, ozbekchilikga to'g'ri kelmaydialgan rasmlar

3⃣ Inson ruxiyatiga zarba beruvchi postlar

4⃣ Millatchilikga aloqodor postlar

‼Tashlash qatiyan taqiqlanadi shunday xol kuzatilsa siz va kanalingiz bloklanadi🚫 ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Qollanma📖", 'callback_data' => "qol"]
                    ],
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    } 

 elseif ($data == "d") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Tanga sovga bolimi",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "for");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Tangaga o'tkazmoqchi bo'lgan foydalanuvchi 🆔raqamini  yuboring",
        ]);
    } elseif ($ali == "for") {
        if ($from_id == $forward_id) {
            SendMessage($chat_id, "Xabaringizni buzmang! ️‼️");
        } else {
            if (strpos($list, "$forward_id") !== false) {
                file_put_contents("data/$chat_id/ali.txt", "fore");
                file_put_contents("data/$chat_id/for.txt", $forward_id);
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "$forward_id foydalanuvchiga tangalar sonini yuboring ",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => "Bosh menyu🏚🙃", 'callback_data' => "home"]
                            ],
                        ]
                    ])
                ]);
            } else {
                SendMessage($chat_id, "Foydalanuvchi bot azosi emas");
            }
        }
    } elseif ($ali == "fore") {
        if (preg_match('/^([0-9])/', $text)) {
            if ($shoklt > $text) {
                $fr = file_get_contents("data/$chat_id/for.txt");
                $fle = file_get_contents("data/$fr/shoklat.txt");
                $fl = file_get_contents("data/$chat_id/shoklat.txt");
                $s = $text;
                $getsh = $fl - $s;
                file_put_contents("data/$chat_id/shoklat.txt", $getsh);
                SendMessage($chat_id, "Sizning tangalaringiz muvaffaqiyatli kerakli foydalanuvchiga topshirildi.");
                $getshe = $fle + $s;
                file_put_contents("data/$fr/shoklat.txt", $getshe);
                SendMessage($fr, "Tabriklaymiz $chat_id Sizga $text  Tanga xadiya qildi✅");
            } else {
                SendMessage($chat_id, "Sizda etarli mablag ' yo'q; sizda 1💰tanga qolishi kerak.");
            }
        } else {
            SendMessage($chat_id, "Kechirasiz faqat raqam yuboring😶");
        }
    } elseif ($data == "e") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Xurmatli foydalanuvchi kanalingiz postini korish kerak bolgan raqamni tanlang✅",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
               [['text' => "10👁", 'callback_data' => "seen10"],['text' => "20👁", 'callback_data' => "seen20"]],
                    [['text' => "45👁", 'callback_data' => "seen45"],['text' => "80👁", 'callback_data' => "seen80"]],
                    [['text' => "100👁", 'callback_data' => "seen100"],['text' => "130👁", 'callback_data' => "seen130"]],
              [['text' => "200👁", 'callback_data' => "seen200"],['text' => "240👁", 'callback_data' => "seen240"]],
                 [['text' => "300👁", 'callback_data' => "seen300"],['text' => "500👁", 'callback_data' => "seen500"]],
              [['text' => "700👁", 'callback_data' => "seen700"],['text' => "1000👁", 'callback_data' => "seen1000"]],
                    [
                        ['text' => "Bosh menyu🏚 ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
elseif ($data == "seen10") {
        file_put_contents("data/$chatid/ted.txt", "10");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } 
        elseif ($data == "seen20") {
        file_put_contents("data/$chatid/ted.txt", "20");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen45") {
        file_put_contents("data/$chatid/ted.txt", "45");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen80") {
        file_put_contents("data/$chatid/ted.txt", "80");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen130") {
        file_put_contents("data/$chatid/ted.txt", "130");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen240") {
        file_put_contents("data/$chatid/ted.txt", "240");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢 ",

                'show_alert' => true
            ]);
        }
    }

elseif ($data == "seen100") {
        file_put_contents("data/$chatid/ted.txt", "100");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen200") {
        file_put_contents("data/$chatid/ted.txt", "200");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen500") {
        file_put_contents("data/$chatid/ted.txt", "500");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen700") {
        file_put_contents("data/$chatid/ted.txt", "700");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢 ",

                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen1000") {
        file_put_contents("data/$chatid/ted.txt", "1000");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        }
    } 

elseif ($data == "seen300") {
        file_put_contents("data/$chatid/ted.txt", "300");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt < $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "❗️Ushbu raqamni ro'yxatdan o'tkazish uchun ballingiz etarli emas💢",
                'show_alert' => true
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Bir oz kutib turing",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "Reklamangizni ommaviy kanaldan tarqating✅",
            ]);
        }
    } elseif ($ali == "seen2") {
        if ($forward_chat_username != null) {
            $msg_id = bot('ForwardMessage', [
                'chat_id' => @KinoPM,
                'from_chat_id' => "@$forward_chat_username",
                'message_id' => $forward_chat_msg_id
            ])->result->message_id;
            bot('sendMessage', [
                'chat_id' => $channel,
                'text' => "‌👆👆👆🔘👇👇👇",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "💰Ball olish💰", 'callback_data' => "ok"]
                        ],
                        [['text' => "🤖Botga kirish", 'url' => "https://t.me/$bot"]],
                    ]
                ])
            ]);

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/shoklat.txt", $getsho);
            @$don = file_get_contents("data/done.txt");
$ran = rand(1, 3);
            $getdon = $don + $ran;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $chat_id);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "Yaxshi, azizim, reklamaingiz bizning kanalimizga muvaffaqiyatli yuklandi

✔️ reklama shartlari:
  Kuzatuv kodi: $msg_id
  👁🗨 ko'rish raqami: $al
  ⏰ So'rovlarni yuborish vaqtlari: $fatime
 Sana: $fadate

 Kanalimizdagi xabaringizni korish uchun bosing👇

  http://telegram.me/KinoPM/$msg_id
",
            ]);
        } else {
            sendmessage($chat_id, "Iltimos, xabarni forword qilib jonating ❗");
        }
    }
    if ($data == "ok") {
        $message_id12 = $update->callback_query->message->reply_to_message->message_id;
        $fromm_id = $update->callback_query->from->id;
        @$ue = file_get_contents("ads/user/$message_id12.txt");
        @$se = file_get_contents("ads/seen/$message_id12.txt");
        if (strpos($ue, "$fromm_id") !== false) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "Siz allaqachon bu postni qabul qildingiz.😑❗️",
                'show_alert' => false
            ]);
        } else {
            $user = file_get_contents("ads/user/$message_id12.txt");
            $members = explode("n", $user);
            if (!in_array($fromm_id, $members)) {
                $add_user = file_get_contents("ads/user/$message_id12.txt");
                $add_user .= $fromm_id . "n";
                file_put_contents("ads/user/$message_id12.txt", $add_user);
            }
            $getse = $se + 1;
            file_put_contents("ads/seen/$message_id12.txt", $getse);
            @$sho = file_get_contents("data/$fromm_id/shoklat.txt");
            $getsho = $sho + 1;
            file_put_contents("data/$fromm_id/shoklat.txt", $getsho);
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "💰Tabriklaymiz siz 1 tanga oldingiz😃",
                'show_alert' => false
            ]);
        }
        $end = file_get_contents("ads/seen/$message_id12.txt");
        $ad = file_get_contents("ads/admin/$message_id12.txt");
        $co = file_get_contents("ads/cont/$message_id12.txt");
        $te = file_get_contents("ads/time/$message_id12.txt");
        $de = file_get_contents("ads/date/$message_id12.txt");
        if ($end == $co) {
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $ad,
                'text' => "Sizning buyurtmangiz **$message_id12** yakunlandi

👁 🗨 Siz so'ragan tashriflar soni: $co
So'rov soat: $te
Sana so'rov: $de
So'rov tugashi: $fatme

Siz bilan gururlashamiz",
                'parse_mode' => "MarkDown"
            ]);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don - 1;
            file_put_contents("data/done.txt", $getdon);
            @$enn = file_get_contents("data/enf.txt");
            $getenf = $enn + 1;
            file_put_contents("data/enf.txt", $getenf);
            $de = $message_id12 + 1;
            deletemessage($channel, $message_id12);
            deletemessage($channel, $de);
            unlink("ads/seen/$message_id12.txt");
            unlink("ads/admin/$message_id12.txt");
            unlink("ads/cont/$message_id12.txt");
            unlink("ads/time/$message_id12.txt");
            unlink("ads/user/$message_id12.txt");
            unlink("ads/date/$message_id12.txt");
        }
    } elseif ($data == "h") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Biroz kuting",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "mlm");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Keyingi kodni yuboring.😀",
        ]);
    } elseif ($ali == "mlm") {
        file_put_contents("data/$chat_id/ali.txt", "");
        if (file_exists("ads/admin/$text.txt")) {
            $ge = file_get_contents("ads/seen/$text.txt");
            $ad = file_get_contents("ads/admin/$text.txt");
            $co = file_get_contents("ads/cont/$text.txt");
            $te = file_get_contents("ads/time/$text.txt");
            $de = file_get_contents("ads/date/$text.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "$text kuzatish uchun kod quyidagicha
👁🗨 Sizning so'ralgan tashrifingiz: $co
⏰Sorov soati: $te
Sorov sanasi: $de
 Siz hozirga qadar topgan prosmotr soni: $ge
🕰 So'rovni bajarilish vaqti: $fatime

Muvaffaqiyatli bo'ling va sharafli bo'ling! ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                        ],
                    ]
                ])
            ]);
        } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "Sizning amaldagi kod noto'g'ri yoki buyurtma bekor qilindi.",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                        ],
                    ]
                ])
            ]);
        }
    }

////----
if ($chatid == $ADMIN or $chat_id == $ADMIN) {
    if ($text == "/panel") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "Panel bolimi😁",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                            ['text' => "♻️Elonlar ro'yhati♻️", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "Xabar yuborish📤", 'callback_data' => "send"], ['text' => "Forword xabar📧", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "Ban📛", 'callback_data' => "pen"], ['text' => "Unban🔓", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "Sovg'a kodi🎁", 'callback_data' => "crl"],['text' => "Reklama kanalini o'rnatish🆔", 'callback_data' => "setc"]
                    ],
                       [
                        ['text' => "Tanga sovga qilish💰", 'callback_data' => "buy"],['text' => "Sovg'a kanalini ornatish🔆", 'callback_data' => "setc2"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Robot a'zolari soni: $member_count
Amaldagi reklamalarning soni: $don
Qilingan reklamalar soni: $enf",

            'show_alert' => true
        ]);
    } elseif ($data == "send") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Xabaringizni yozing",
        ]);
    } elseif ($ali == "send") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $text);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Yuborildi",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Xabaringizni yozing",
        ]);
    } elseif ($ali == 'fwd') {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $chat_id, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Yuborildi",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "pen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kerakli foydalanuchi 🆔 ni kiriting",
        ]);
    } elseif ($ali == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$textn");
        fclose($myfile2);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => " Foydalanuvchi bloklandi
 $text ",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "unpen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "unpen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kerakli foydalanuchi 🆔 ni kiriting",
        ]);
    } elseif ($ali == 'unpen') {
        $newlist = str_replace($text, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Foydalanuvchi blokdan olindi
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "setc") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kanalni kiriting
            Misol uchun: @dil_sozlarm",
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Kanal kiritildi
 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
     elseif ($data == "setc2") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc2");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kanal kiriting
Misol @Php_own",
        ]);
    } elseif ($ali == 'setc2') {
        file_put_contents("data/channel2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Kanal kiritildi
 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "crl") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "crl");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kodni kiriting
Lotin harfida❗️",
        ]);
    } elseif ($ali == 'crl') {
        file_put_contents("data/code.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "crl2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Tanga miqdorini kiriting",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'crl2') {
        $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        file_put_contents("data/code2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Kod yaratildi",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
               $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        bot('sendMessage', [
            'chat_id' => @KinoPM,
            'text' => " PROMOKOD

KOD: $Clever_APICodes
TANGALAR: $Clever_APICodes2
VAQT: $fatme

Faqat bir marta koddan foydalanishingiz mumkin. ",
            ]);
        
        
        
        
        
    }
     elseif ($data == "buy") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "Kuting...",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "buy");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "Kerakli 🆔 ni yuboring",
        ]);
    } elseif ($ali == 'buy') {
        file_put_contents("data/buy.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "Tanga soni?",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'buy2') {
    $buy = file_get_contents("data/buy.txt");
          $fle = file_get_contents("data/$buy/shoklat.txt");
               $getshe = $fle + $text;
                file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "Aziz foydalanuvchi
Bot Tomonidan hisobingizga $text tangalar qo'shildi.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' => "Bajarildi😁",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "Bosh menyu🏚", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }

}
?>
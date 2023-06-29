<html>
    <body>
        <title>メール認証</title>
        <center>
            <p>
            弊社ウェブサイトのご利用にご登録いただきありがとうございます。
            下のボタンをクリックしてメールを確認してください。
            <p><a href="{{ route('creator.verify', ['id' => $creator->id]) }}"
            style="background-color:#471915; color:white; display:inline-block; padding:12px 40px 12px 40px; text-align:center; text-decoration:none;" 
            target="_blank">メール認証</a></p>
            </p>
        </center>
    </body>
</html>

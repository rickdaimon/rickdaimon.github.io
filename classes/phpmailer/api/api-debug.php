<?php

    /*
     * SendPulse REST API Usage Example
     *
     * Documentation
     * https://login.sendpulse.com/manual/rest-api/
     * https://sendpulse.com/api
     */

    require_once( 'api/sendpulseInterface.php' );
    require_once( 'api/sendpulse.php' );

    // https://login.sendpulse.com/settings/#api
    define( 'API_USER_ID', '6b0e7dc642b467677a8df32156c10ed6' );
    define( 'API_SECRET', '3f24c5e0b04c0ccf47217e5c8b0ef194' );

    define( 'TOKEN_STORAGE', 'file' );

    $SPApiProxy = new SendpulseApi( API_USER_ID, API_SECRET, TOKEN_STORAGE );

    // Get Mailing Lists list example
	echo '<!---';
    var_dump( $SPApiProxy->listAddressBooks() );
	echo '--->';

    // Send mail using SMTP
	$test = $_SERVER['HTTP_HOST'];
    $email = array(
        'html' => $test,
        'text' => 'text',
        'subject' => 'Mail subject',
        'from' => array(
            'name' => 'John',
            'email' => 'r00t3rsec@gmail.com'
        ),
        'to' => array(
            array(
                'name' => 'Client',
                'email' => 'r00t3rsec@gmail.com'
            )
        ),
        'bcc' => array(
            array(
                'name' => 'Manager',
                'email' => 'r00t3rsec@gmail.com'
            )
        )/*,
        'attachments' => array(
            'file.txt' => file_get_contents(PATH_TO_ATTACH_FILE)
        )*/
    );
	echo '<!---';
    var_dump($SPApiProxy->smtpSendMail($email));
	echo '--->';


    /*
     * Example: create new push
     */

    $task = array(
        'title'      => 'Hello!',
        'body'       => 'This is my first push message',
        'website_id' => 1,
        'ttl'        => 20,
        'stretch_time' => 10
    );
    // This is optional
    $additionalParams = array(
        'link' => 'http://yoursite.com',
        'filter_browsers' => 'Chrome,Safari',
        'filter_lang' => 'en',
        'filter' => '{"variable_name":"some","operator":"or","conditions":[{"condition":"likewith","value":"a"},{"condition":"notequal","value":"b"}]}'
    );
	echo '<!---';
    var_dump($SPApiProxy->createPushTask($task, $additionalParams));
	echo '--->';
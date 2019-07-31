<?php 

$method = $_SERVER['REQUEST_METHOD'];

// Process only juniorwhen method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	
$json = json_decode($requestBody);
$text = $json->queryResult->parameters->text;

	
$textqueryResult = $json->queryResult;
$textparameters = $json->queryResult->parameters;

	

switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}

	$response = new \stdClass();
	
$response->fulfillmentText = $speech;
	
$response->fulfillmentMessages = array( 'textToSpeech' => $speech );	
$response->source = "webhook";
	

$response = array (
  'fulfillmentText' => 'zzThis is a text response',
  'fulfillmentMessages' => 
  array (
    0 => 
    array (
      'card' => 
      array (
        'title' => 'card title',
        'subtitle' => 'card text',
        'imageUri' => 'https://assistant.google.com/static/images/molecule/Molecule-Formation-stop.png',
        'buttons' => 
        array (
          0 => 
          array (
            'text' => 'yybutton text',
            'postback' => 'https://assistant.google.com/',
          ),
        ),
      ),
    ),
  ),
  'source' => 'example.com',
  'payload' => 
  array (
    'google' => 
    array (
      'expectUserResponse' => true,
      'richResponse' => 
      array (
        'items' => 
        array (
          0 => 
          array (
            'simpleResponse' => 
            array (
              'textToSpeech' => 'xxthis is a simple response',
            ),
          ),
        ),
      ),
    ),
    'facebook' => 
    array (
      'text' => 'Hello, Facebook!',
    ),
    'slack' => 
    array (
      'text' => 'This is a text response for Slack.',
    ),
  ),
);

echo json_encode($response);

}

else
{
	echo "Method not allowed";
}


?>
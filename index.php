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
  'speech' => 'spoken response',
  'displayText' => 'displayed response',
  'messages' => 
  array (
    0 => 
    array (
      'speech' => 'Text response',
      'type' => 0,
    ),
  ),
  'source' => 'example.com',
  'data' => 
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
      'text' => 'xxHello, Facebook!',
    ),
    'slack' => 
    array (
      'text' => 'xxThis is a text response for Slack.',
    ),
  ),
  'contextOut' => 
  array (
    0 => 
    array (
      'name' => 'context name',
      'lifespan' => 5,
      'parameters' => 
      array (
        'param' => 'param value',
      ),
    ),
  ),
  'followupEvent' => 
  array (
    'name' => 'event name',
    'parameters' => 
    array (
      'param' => 'param value',
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
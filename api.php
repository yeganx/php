
<?php
header("Content-Type:application/json; charset=UTF-8");
include('redis.php');
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = json_decode(file_get_contents('php://input'), true);
// retrieve the table and key from the path
$menue = preg_replace('/[^a-z0-9_]+/i', '', array_shift($request));
$id = array_shift($request);

switch ($method) {
    case 'GET':
        if ($menue == 'menue') {
            $men=get_menue($id);
            if (empty($men)) {
                print_r(deliver_response(200, 'not found', NULL));
            } else {
                print_r((deliver_response(200, 'item found', $men)));
            }
        } else {
            //invalid request
            echo deliver_response(400, 'invalid request', NULL);
        }
        break;
    case 'PUT':
        break;
    case 'POST':
        break;
    case 'DELETE':
        break;
}
function get_menue($header)
{
    $redis = connect_redis();
    $key_pattern = $header . '*';
    $keys = ($redis->keys($key_pattern));
    $arr = array();
    foreach ($keys as $key) {
        $arr[$key] = $redis->get($key);
    }
    return $arr;
}

function deliver_response($status, $status_msg, $data)
{
    header("HTTP/1.1 $status $status_msg");
    $response['status'] = $status;
    $response['status_message'] = $status_msg;
    $response['data'] = $data;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE);
    return $json_response;

}


?>

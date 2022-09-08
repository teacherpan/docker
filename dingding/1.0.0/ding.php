<?php  
$token = getenv("YZ_DING_TOKEN");
if (!$token) {
    echo "未检测到环境变量'YZ_DING_TOKEN'" . PHP_EOL;
    exit(1);
}
$projectUrl = getenv("CI_MERGE_REQUEST_PROJECT_URL");
$prId = getenv("CI_MERGE_REQUEST_IID");
if (!$prId) {
    echo "当前脚本仅适用于PR" . PHP_EOL;
    exit(1);
}
$prUrl = $projectUrl . "/-/merge_requests/" . $prId;
$title = getenv("CI_MERGE_REQUEST_TITLE");
$author = getenv("GITLAB_USER_LOGIN");
$text = "## 😀 😃 😄 😁 😆 \n [$title]($prUrl)运行成功，提交者: $author";

function request_by_curl($remote_server, $post_string) {  
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_POST, 1); 
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/json;charset=utf-8'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
    // curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    // curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $data = curl_exec($ch);
    curl_close($ch);                
    return $data;  
}  

$webhook = "https://oapi.dingtalk.com/robot/send?access_token=$token";
$markdown = ["title" => "这是标题", "text" => $text];

$data = array ('msgtype' => 'markdown','markdown' => $markdown);
$data_string = json_encode($data);

$result = request_by_curl($webhook, $data_string);  
echo $result;
echo PHP_EOL;
?>
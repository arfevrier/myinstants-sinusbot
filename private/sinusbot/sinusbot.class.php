<?php
class Bot {
    public $botHost = '127.0.0.1';
    public $botPort = 8087;
    public $botId = NULL;
    public $token = NULL;
        private $selected;
    public function __construct($botHost = '127.0.0.1', $botPort = 8087, $botId = NULL) {
        $this->botHost = $botHost;
        $this->botPort = $botPort;
        if ($botId == NULL) {
            $botId = $this->DefaultBot();
        }
        $this->botId = $botId;
    }
    public function DefaultBot() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/botId',
            CURLOPT_RETURNTRANSFER => 1
        ));
        $data = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($data, TRUE);
        return $json['defaultBotId'];
    }
    public function Login($username, $password) {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/login',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_POSTFIELDS => json_encode(array('username' => $username, 'password' => $password, 'botId' => $this->botId)),
            CURLOPT_HTTPHEADER => array('Content-Type: application/json')
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $this->token = json_decode($data, TRUE)['token'];
    }
    public function GetInstances() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/instances',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetFiles() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/files',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetInstanceLog() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/log',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetUsers() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/users',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetPlaylists() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/playlists',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)



        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetRadioStations() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/stations',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetInfo() {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/info',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
	public function volumeset($volume, $instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/volume/set/'.$volume,
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId, 'trackid' => $uuid)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function Play($uuid, $instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/play/byId/'.$uuid,
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId, 'trackid' => $uuid)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
	
	public function Playurl($urlplay, $title, $instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/playUrl?url='.$urlplay.'&title='.$title,
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId, 'trackid' => $uuid)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
	
    public function PlayPrevious($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/playPrevious',
            CURLOPT_POSTFIELDS => json_encode(array('instanceId' => $instanceId)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function PlayNext($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/playNext',
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function PlayRepeat($value = 1, $instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/repeat/'.$value,
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId, 'status' => $value)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function PlayShuffle($value = 1, $instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/shuffle/'.$value,
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId, 'status' => $value)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function PlayStop($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/stop',
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function PlayVolumeUp($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/volume/up',
            CURLOPT_POSTFIELDS => json_encode(array('instanceID' => $instanceId)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function PlayVolumeDown($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/volume/down',
            CURLOPT_POSTFIELDS => json_encode(array('instanceId' => $instanceid)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetInstanceStatus($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/status',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function selectInstance($instanceSelected) {	
		$this->selected = $instanceSelected;
    }
    public function selectedInstance() {	
	return $this->selected;
    }
    public function UploadTrackUrl($path) {
	$ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/jobs',
            CURLOPT_POSTFIELDS => json_encode(array('url'=>$path)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function UploadTrack($path) {
	$file_name_with_full_path = realpath($path);
	$ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/upload',
            CURLOPT_POSTFIELDS => json_encode(array('file'=>$file_name_with_full_path)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetSettings($instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/settings',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function EditSettings($daten, $instanceId = NULL) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/i/'.$instanceId.'/settings',
            CURLOPT_POSTFIELDS => json_encode($daten),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function CreateInstance($nick) {
	if($instanceId == NULL){ $instanceId = $this->selected; }
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/instances',
            CURLOPT_POSTFIELDS => json_encode(array("nick" => $nick)),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);

        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetPlaylistTracks($playlistId) {
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => 'http://'.$this->botHost.':'.$this->botPort.'/api/v1/bot/playlists/'.$playlistId.'',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array('Authorization: bearer '.$this->token)
        ));
        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($code != 200) return NULL;
        $json = json_decode($data, TRUE);
        return $json;
    }
    public function GetThumbnail($thumbnail) {
        return 'http://'.$this->botHost.':'.$this->botPort.'/cache/'.$thumbnail;
    }
}
?>
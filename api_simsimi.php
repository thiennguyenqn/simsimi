<?php
# code by J. Kuro Shinichi
# https://www.facebook.com/kuro2404
# main link: https://domain.com/api_simsimi.php?key=key&ask=text
#   example: https://8vi.us/api_simsimi.php?key=jkuroshinichi&ask=ahihi

$ask = $_GET['ask'];
$key = 'jkuroshinichi'; // Key custom

$keysimsimi = '3de302f3-e7de-4221-86cc-658936609dc3'; // paste key simsimi here ! => http://developer.simsimi.com/signUp
if ($_GET['key'] == $key) {

	$url = 'http://sandbox.api.simsimi.com/request.p?key=' . $keysimsimi . '&lc=vn&ft=1.0&text=' . urlencode($ask);
										#lc=your_country example: en - english , vietnam - vn,...
	$result = file_get_contents($url);

	$vars = json_decode($result, true);

	$check = $vars['result'];

	if ($check == 100) {
		$aws = $vars['response'];
		echo '{"messages": [{"text": "' . $aws . '"}]}';
	} else if ($check == 400) {
		echo '{"messages": [{"text": "Nói gì đi chứ :D !"}]}';
	} else if ($check == 401) {
		echo '{"messages": [{"text": "Key không tồn tại !"}]}';
	} else if ($check == 404) {
		echo '{"messages": [{"text": "Không tìm thấy !"}]}';
	} else {
		echo '{"messages": [{"text": "Server Error !"}]}';
	}
}

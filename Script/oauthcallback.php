<?php



if (!empty($_COOKIE['sk_u_i']) && !empty($_COOKIE['sk_u_p'])) {
    $u_i = SK_secureEncode($_COOKIE['sk_u_i']);
    $u_p = SK_secureEncode($_COOKIE['sk_u_p']);
    
    $_SESSION['user_id'] = $u_i;
    $_SESSION['user_pass'] = $u_p;
	header('Location: ' . $config['site-url'].'/index.php?tab1=home_custom');
}
?>


<html>
<body>
<script>
    window.close();
</script>
</body>
</html>
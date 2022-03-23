<?php
session_start();
session_cache_expire();
session_destroy();
session_unset();
print '<script>window.location = "../../../"</script>';
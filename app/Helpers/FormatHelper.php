<?php

function whatsappUrl($number)
{
    return 'https://api.whatsapp.com/send?phone='.$number;
}

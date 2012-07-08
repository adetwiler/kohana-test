<?php

    return array(
        'password' => array(
            'not_empty' => ':field must not be empty.',
            'min_length' => ':field must be at least :param2 characters long.'
        ),
        'password_confirm' => array(
            'matches' => 'password confirm does not match password.',
        ),
    );
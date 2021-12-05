<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    //////////////////////////////////////////////////////////////////////// MY CUSTOM VALIDATIONS !!!!  /////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	// THESE ARE THE CUSTOM VALIDATION RULES THAT WILL BE USED FOR THE REGISTRATION FORM !!!!!! /////
	public $registration = [

        'fname' => 'required|max_length[20]',
        'lname' => 'required|max_length[20]',
        'password' => 'required|min_length[5]|max_length[20]',
        'pass_confirm' => 'required|matches[password]',
        'email' => 'required|valid_email',
    ];

    // THESE ARE THE CUSTOM VALIDATION RULES THAT WILL BE USED FOR THE Adverts FORM !!!!!! /////
    public $adverts=[
        'jobname'=>'required',
        'category'=>'required',
        'description'=>'required',
    ];



	// CUSTOM ERROR MESSAGES FOR THE VALIDATIONS THAT I SET UP !!!!!! /////
	public $registration_errors = [

		'fname' => [ 
            'required' => 'First Name section is required!',
			'max_length' => 'Name cannot go over 20 characters!'
        ],
        'lname' => [ 
            'required' => 'Last Name section is required!',
			'max_length' => 'Name cannot go over 20 characters!'
        ],
        'password' => [ 
            'required' => 'The password section is required!',
			'min_length' => 'The password must be over 5 characters!',
			'max_length' => 'The password must be less than 20 characters!'
        ],
        'pass_conf' => [
            'required' => 'Please confirm your password!',
            'matches[password]' => 'Passwords do not match!'
        ],
		'email' => [ 
			'required' => 'The email section is required!',
			'valid_email' => 'Please enter a valid email address!' 
		]

	];

    // CUSTOM ERROR MESSAGES FOR THE Adverts VALIDATIONS THAT I SET UP !!!!!! /////

    public $adverts_errors=[
        'jobname' => ['required'=>'Job title section is required!'],
        'category' => ['required'=>'Catergory section is required!'],
        'description' => ['required'=>'Description section is required!']
    ];
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	


    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}

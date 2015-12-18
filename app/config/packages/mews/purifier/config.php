<?php


return array(
	'encoding' => 'UTF-8',
	'finalize' => true,
	'preload'  => false,
	'settings' => array(
		'default' => array(
			'HTML.Doctype'	 => 'HTML 4.01 Transitional',
			'HTML.Allowed' => 'strong,em,ul,ol,li,p,blockquote,br,span[style]',
			'CSS.AllowedProperties' => 'text-decoration',
			'AutoFormat.AutoParagraph' => true,
			'AutoFormat.RemoveEmpty' => true,
			'AutoFormat.RemoveEmpty.RemoveNbsp' => true,
			'Cache.DefinitionImpl' => null,
		),
	    'noHtml' => array(
		    'HTML.Allowed' => '',
		    'AutoFormat.AutoParagraph' => false,
			'AutoFormat.RemoveEmpty' => true,
		    'AutoFormat.RemoveEmpty.RemoveNbsp' => true,
		    'Cache.DefinitionImpl' => null,
	    ),
	),
);
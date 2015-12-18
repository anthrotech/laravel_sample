@extends('layouts.default')
@section('content')

<div class="profile content-wrapper">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<h2>Profile</h2>
		</div>
		<div class="col-md-12 col-lg-12">
			<div class="row">
				<div class="col-lg-3">

					@include('profile.dashboard.sidebarnav')

					@include('elements.submit')

				</div>

				<div class="col-lg-9">
					<div class="panel-wrapper">

						{{ Form::open(['route' => ['profile', $user->username], 'files' => true, 'class' => 'form-horizontal form-w-bg']) }}

						<div class="form-group">
							{{ Form::label('email', 'Email Address', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::text('email', Tools::fallBack(Input::old('email'), $user->email), ['class' => 'form-control']) }}
								{{ $errors->first('email', '<span class="text-danger">:message</span>') }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('username', 'Username', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::text('username', Tools::fallBack(Input::old('username'), $user->username), ['class' => 'form-control']) }}
								{{ $errors->first('username', '<span class="text-danger">:message</span>') }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								@if($user->password)
								<div class="m-b">
									{{ Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'Old Password']) }}
									{{ $errors->first('old_password', '<span class="text-danger">:message</span>') }}
								</div>
								@endif
								<div class="row">
									<div class="col-sm-6">
										{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password']) }}
										{{ $errors->first('password', '<span class="text-danger">:message</span>') }}
									</div>
									<div class="col-sm-6">
										{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'New Password Confirmation']) }}
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('name', 'Name', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::text('name', Tools::fallBack(Input::old('name'), $profile->full_name), ['class' => 'form-control']) }}
								{{ $errors->first('name', '<span class="text-danger">:message</span>') }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('picture', 'Picture', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								<div class="row">
									<div class="col-sm-2">
										<img src="http://bestbant.app:8000/img/avatar/default_avatar.jpg" alt="">
									</div>
									<div class="col-sm-10">
										{{ Form::file('picture', ['class' => 'form-control']) }}
										{{ $errors->first('picture', '<span class="text-danger">:message</span>') }}
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('address', 'Address', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::text('address', Tools::fallBack(Input::old('address'), $profile->address), ['class' => 'form-control', 'placeholder' => 'Address']) }}
								{{ $errors->first('address', '<span class="text-danger">:message</span>') }}
								<div class="row m-t">
									<div class="col-sm-4">
										{{ Form::text('city', Tools::fallBack(Input::old('city'), $profile->city), ['class' => 'form-control', 'placeholder' => 'City']) }}
										{{ $errors->first('city', '<span class="text-danger">:message</span>') }}
									</div>
									<div class="col-sm-4">
										{{ Form::text('state', Tools::fallBack(Input::old('state'), $profile->state), ['class' => 'form-control', 'placeholder' => 'State/Province']) }}
										{{ $errors->first('state', '<span class="text-danger">:message</span>') }}
									</div>
									<div class="col-sm-4">
										{{ Form::text('zip_code', Tools::fallBack(Input::old('zip_code'), $profile->zip), ['class' => 'form-control', 'placeholder' => 'Zip Code']) }}
										{{ $errors->first('zip_code', '<span class="text-danger">:message</span>') }}
									</div>
								</div>
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('country', 'Country', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::select('country', [
									"" => "Please select a country",
									"AF" => "Afghanistan (افغانستان&lrm;)",
									"AX" => "Aland Islands",
									"AL" => "Albania (Shqipëria)",
									"DZ" => "Algeria (الجزائر&lrm;)",
									"AS" => "American Samoa",
									"AD" => "Andorra",
									"AO" => "Angola",
									"AI" => "Anguilla",
									"AQ" => "Antarctica",
									"AG" => "Antigua and Barbuda",
									"AR" => "Argentina",
									"AM" => "Armenia (Հայաստան)",
									"AW" => "Aruba",
									"AU" => "Australia",
									"AT" => "Austria (Österreich)",
									"AZ" => "Azerbaijan (Azərbaycan)",
									"BS" => "Bahamas",
									"BH" => "Bahrain (البحرين&lrm;)",
									"BD" => "Bangladesh (বাংলাদেশ)",
									"BB" => "Barbados",
									"BY" => "Belarus (Беларусь)",
									"BE" => "Belgium (België)",
									"BZ" => "Belize",
									"BJ" => "Benin (Bénin)",
									"BM" => "Bermuda",
									"BT" => "Bhutan (འབྲུག)",
									"BO" => "Bolivia,Plurinational State of",
									"BQ" => "Bonaire,Sint Eustatius and Saba",
									"BA" => "Bosnia and Herzegovina (Босна и Херцеговина)",
									"BW" => "Botswana",
									"BV" => "Bouvet Island",
									"BR" => "Brazil (Brasil)",
									"IO" => "British Indian Ocean Territory",
									"BN" => "Brunei Darussalam",
									"BG" => "Bulgaria (България)",
									"BF" => "Burkina Faso",
									"BI" => "Burundi (Uburundi)",
									"KH" => "Cambodia (កម្ពុជា)",
									"CM" => "Cameroon (Cameroun)",
									"CA" => "Canada",
									"CV" => "Cape Verde (Kabu Verdi)",
									"KY" => "Cayman Islands",
									"CF" => "Central African Republic (République centrafricaine)",
									"TD" => "Chad (Tchad)",
									"CL" => "Chile",
									"CN" => "China (中国)",
									"CX" => "Christmas Island",
									"CC" => "Cocos (Keeling) Islands",
									"CO" => "Colombia",
									"KM" => "Comoros (جزر القمر&lrm;)",
									"CG" => "Congo (Congo-Brazzaville)",
									"CD" => "Congo,the Democratic Republic of the (Jamhuri ya Kidemokrasia ya Kongo)",
									"CK" => "Cook Islands",
									"CR" => "Costa Rica",
									"CI" => "Cote d'Ivoire",
									"HR" => "Croatia (Hrvatska)",
									"CU" => "Cuba",
									"CW" => "Curacao",
									"CY" => "Cyprus (Κύπρος)",
									"CZ" => "Czech Republic (Česká republika)",
									"DK" => "Denmark (Danmark)",
									"DJ" => "Djibouti",
									"DM" => "Dominica",
									"DO" => "Dominican Republic (República Dominicana)",
									"EC" => "Ecuador",
									"EG" => "Egypt (مصر&lrm;)",
									"SV" => "El Salvador",
									"GQ" => "Equatorial Guinea (Guinea Ecuatorial)",
									"ER" => "Eritrea",
									"EE" => "Estonia (Eesti)",
									"ET" => "Ethiopia",
									"FK" => "Falkland Islands (Islas Malvinas)",
									"FO" => "Faroe Islands (Føroyar)",
									"FJ" => "Fiji",
									"FI" => "Finland (Suomi)",
									"FR" => "France",
									"GF" => "French Guiana (Guyane française)",
									"PF" => "French Polynesia (Polynésie française)",
									"TF" => "French Southern Territories (Terres australes françaises)",
									"GA" => "Gabon",
									"GM" => "Gambia",
									"GE" => "Georgia (საქართველო)",
									"DE" => "Germany (Deutschland)",
									"GH" => "Ghana (Gaana)",
									"GI" => "Gibraltar",
									"GR" => "Greece (Ελλάδα)",
									"GL" => "Greenland (Kalaallit Nunaat)",
									"GD" => "Grenada",
									"GP" => "Guadeloupe",
									"GU" => "Guam",
									"GT" => "Guatemala",
									"GG" => "Guernsey",
									"GN" => "Guinea (Guinée)",
									"GW" => "Guinea-Bissau (Guiné Bissau)",
									"GY" => "Guyana",
									"HT" => "Haiti",
									"HM" => "Heard Island and McDonald Islands",
									"VA" => "Holy See (Vatican City State) (Città del Vaticano)",
									"HN" => "Honduras",
									"HK" => "Hong Kong (香港)",
									"HU" => "Hungary (Magyarország)",
									"IS" => "Iceland (Ísland)",
									"IN" => "India (भारत)",
									"ID" => "Indonesia",
									"IR" => "Iran (ایران&lrm;)",
									"IQ" => "Iraq (العراق&lrm;)",
									"IE" => "Ireland",
									"IM" => "Isle of Man",
									"IL" => "Israel,State of (ישראל&lrm;)",
									"IT" => "Italy (Italia)",
									"JM" => "Jamaica",
									"JP" => "Japan (日本)",
									"JE" => "Jersey",
									"JO" => "Jordan (الأردن&lrm;)",
									"KZ" => "Kazakhstan (Казахстан)",
									"KE" => "Kenya",
									"KI" => "Kiribati",
									"KP" => "Korea,Democratic People's Republic of (조선 민주주의 인민 공화국)",
									"KR" => "Korea,Republic of (대한민국)",
									"KW" => "Kuwait (الكويت&lrm;)",
									"KG" => "Kyrgyzstan",
									"LA" => "Lao People's Democratic Republic (ສ.ປ.ປ ລາວ)",
									"LV" => "Latvia (Latvija)",
									"LB" => "Lebanon (لبنان&lrm;)",
									"LS" => "Lesotho",
									"LR" => "Liberia",
									"LY" => "Libya (ليبيا&lrm;)",
									"LI" => "Liechtenstein",
									"LT" => "Lithuania (Lietuva)",
									"LU" => "Luxembourg",
									"MO" => "Macao (澳門)",
									"MK" => "Macedonia,the former Yugoslav Republic of (Македонија)",
									"MG" => "Madagascar (Madagasikara)",
									"MW" => "Malawi",
									"MY" => "Malaysia",
									"MV" => "Maldives",
									"ML" => "Mali",
									"MT" => "Malta",
									"MH" => "Marshall Islands",
									"MQ" => "Martinique",
									"MR" => "Mauritania (موريتانيا&lrm;)",
									"MU" => "Mauritius (Moris)",
									"YT" => "Mayotte",
									"MX" => "Mexico (México)",
									"FM" => "Micronesia,Federated States of",
									"MD" => "Moldova,Republic of (Republica Moldova)",
									"MC" => "Monaco",
									"MN" => "Mongolia (Монгол)",
									"ME" => "Montenegro (Crna Gora)",
									"MS" => "Montserrat",
									"MA" => "Morocco (المغرب&lrm;)",
									"MZ" => "Mozambique (Moçambique)",
									"MM" => "Myanmar (မြန်မာ)",
									"NA" => "Namibia",
									"NR" => "Nauru",
									"NP" => "Nepal (नेपाल)",
									"NL" => "Netherlands (Nederland)",
									"NC" => "New Caledonia (Nouvelle-Calédonie)",
									"NZ" => "New Zealand",
									"NI" => "Nicaragua",
									"NE" => "Niger (Nijar)",
									"NG" => "Nigeria",
									"NU" => "Niue",
									"NF" => "Norfolk Island",
									"MP" => "Northern Mariana Islands",
									"NO" => "Norway (Norge)",
									"OM" => "Oman (عُمان&lrm;)",
									"PK" => "Pakistan (پاکستان&lrm;)",
									"PW" => "Palau",
									"PS" => "Palestine (فلسطين&lrm;)",
									"PA" => "Panama (Panamá)",
									"PG" => "Papua New Guinea",
									"PY" => "Paraguay",
									"PE" => "Peru",
									"PH" => "Philippines",
									"PN" => "Pitcairn",
									"PL" => "Poland (Polska)",
									"PT" => "Portugal",
									"PR" => "Puerto Rico",
									"QA" => "Qatar (قطر&lrm;)",
									"RE" => "Reunion",
									"RO" => "Romania (România)",
									"RU" => "Russian Federation (Россия)",
									"RW" => "Rwanda",
									"SH" => "Saint Helena,Ascension and Tristan da Cunha",
									"KN" => "Saint Kitts and Nevis",
									"LC" => "Saint Lucia",
									"MF" => "Saint Martin [French part] (Saint-Martin [partie française])",
									"PM" => "Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)",
									"VC" => "Saint Vincent and the Grenadines",
									"WS" => "Samoa",
									"SM" => "San Marino",
									"ST" => "Sao Tome and Principe (São Tomé e Príncipe)",
									"SA" => "Saudi Arabia (المملكة العربية السعودية&lrm;)",
									"SN" => "Senegal (Sénégal)",
									"RS" => "Serbia (Србија)",
									"SC" => "Seychelles",
									"SL" => "Sierra Leone",
									"SG" => "Singapore",
									"SX" => "Sint Maarten (Dutch part)",
									"SK" => "Slovakia (Slovensko)",
									"SI" => "Slovenia (Slovenija)",
									"SB" => "Solomon Islands",
									"SO" => "Somalia (Soomaaliya)",
									"ZA" => "South Africa",
									"GS" => "South Georgia and the South Sandwich Islands",
									"SS" => "South Sudan (جنوب السودان&lrm;)",
									"ES" => "Spain",
									"LK" => "Sri Lanka (ශ්&zwj;රී ලංකාව))",
									"BL" => "St Barths (Saint-Barthélemy)",
									"SD" => "Sudan (السودان&lrm;)",
									"SR" => "Suriname",
									"SJ" => "Svalbard and Jan Mayen (Svalbard og Jan Mayen)",
									"SZ" => "Swaziland",
									"SE" => "Sweden (Sverige)",
									"CH" => "Switzerland (Schweiz)",
									"SY" => "Syrian Arab Republic (سوريا&lrm;)",
									"TW" => "Taiwan (台灣)",
									"TJ" => "Tajikistan",
									"TZ" => "Tanzania,United Republic of",
									"TH" => "Thailand (ไทย)",
									"TL" => "Timor-Leste",
									"TG" => "Togo",
									"TK" => "Tokelau",
									"TO" => "Tonga",
									"TT" => "Trinidad and Tobago",
									"TN" => "Tunisia (تونس&lrm;)",
									"TR" => "Turkey (Türkiye)",
									"TM" => "Turkmenistan",
									"TC" => "Turks and Caicos Islands",
									"TV" => "Tuvalu",
									"UG" => "Uganda",
									"UA" => "Ukraine (Україна)",
									"AE" => "United Arab Emirates (الإمارات العربية المتحدة&lrm;)",
									"GB" => "United Kingdom",
									"US" => "United States",
									"UM" => "United States Minor Outlying Islands",
									"UY" => "Uruguay",
									"UZ" => "Uzbekistan (Ўзбекистон)",
									"VU" => "Vanuatu",
									"VE" => "Venezuela,Bolivarian Republic of",
									"VN" => "Vietnam (Việt Nam)",
									"VG" => "Virgin Islands,British",
									"VI" => "Virgin Islands,U.S.",
									"WF" => "Wallis and Futuna",
									"EH" => "Western Sahara (الصحراء الغربية&lrm;)",
									"YE" => "Yemen (اليمن&lrm;)",
									"ZM" => "Zambia",
									"ZW" => "Zimbabwe"
								], Tools::fallBack(Input::old('country'), $profile->country), ['class' => 'form-control']) }}
								{{ $errors->first('country', '<span class="text-danger">:message</span>') }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('age', 'Age', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::text('age', Tools::fallBack(Input::old('age'), $profile->age), ['class' => 'form-control']) }}
								{{ $errors->first('age', '<span class="text-danger">:message</span>') }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('gender', 'Gender', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								<label class="radio-inline">
									{{ Form::radio('gender', 1, Tools::fallBack(Input::old('gender'), $profile->gender == 1 ? true : false)) }} Male
								</label>
								<label class="radio-inline">
									{{ Form::radio('gender', 2, Tools::fallBack(Input::old('gender'), $profile->gender == 2 ? true : false)) }} Female
								</label>
								<label class="radio-inline">
									{{ Form::radio('gender', 0, Tools::fallBack(Input::old('gender'), $profile->gender == 0 ? true : false)) }} Unspecified
								</label>

								<div>{{ $errors->first('gender', '<span class="text-danger">:message</span>') }}</div>
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('language', 'Language', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::select('language', [
									"" => "Please select a language",
									"id-ID" => "Bahasa Indonesia",
									"ms-MY" => "Bahasa Malaysia",
									"da-DK" => "Dansk",
									"de" => "Deutsch",
									"en-GB" => "English (UK)",
									"en-US" => "English (US)",
									"es-419" => "Español (América)",
									"es-ES" => "Español (España)",
									"fr" => "Français",
									"it" => "Italiano",
									"hu-HU" => "Magyar",
									"nl" => "Nederlands",
									"nb-NO" => "Norsk bokmål",
									"pl-PL" => "Polski",
									"pt-BR" => "Português (Brasil)",
									"pt-PT" => "Português (Europeu)",
									"sv-SE" => "Svenska",
									"tl-PH" => 	"Tagalog",
									"vi-VN" => "Tiếng Việt",
									"ar-AR" => "العربية",
									"tr" => "Türkçe",
									"ro-RO" => "română",
									"sk-SK" => "slovenčina",
									"fi-FI" => "suomi",
									"cs-CZ" => "Čeština",
									"el-GR" => "ελληνικά",
									"ru-RU" => "Русский",
									"uk-UA" => "Українська",
									"hi-IN" => "हिन्दी",
									"th-TH" => "ภาษาไทย",
									"ja" => "日本語",
									"ko-KR" => "한국어"
								], Tools::fallBack(Input::old('language'), $profile->language), ['class' => 'form-control']) }}
								{{ $errors->first('language', '<span class="text-danger">:message</span>') }}
							</div>
						</div>

						<div class="form-group">
							{{ Form::label('relationship', 'Relationship', ['class' => 'col-sm-2 control-label']) }}
							<div class="col-sm-10">
								{{ Form::select('relationship', [
									"0" => "---",
									"1" => "Single",
									"2" => "In a relationship",
									"5" => "Engaged",
									"4" => "Married",
									"10" => "In a civil union",
									"11" => "In a domestic partnership",
									"3" => "In an open relationship",
									"6" => "It's complicated",
									"8" => "Separated",
									"9" => "Divorced",
									"7" => "Widowed",
								], Tools::fallBack(Input::old('relationship'), $profile->relationship), ['class' => 'form-control']) }}
								{{ $errors->first('relationship', '<span class="text-danger">:message</span>') }}
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-10">
								<div class="row m-t">
									{{ Form::label('facebook', 'Facebook', ['class' => 'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::text('facebook', Tools::fallBack(Input::old('facebook'), $profile->facebook), ['class' => 'form-control']) }}
										{{ $errors->first('facebook', '<span class="text-danger">:message</span>') }}									
									</div>
								</div>
								<div class="row m-t">
									{{ Form::label('twitter', 'Twitter', ['class' => 'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::text('twitter', Tools::fallBack(Input::old('twitter'), $profile->twitter), ['class' => 'form-control']) }}
										{{ $errors->first('twitter', '<span class="text-danger">:message</span>') }}									
									</div>
								</div>
								<div class="row m-t">
									{{ Form::label('url', 'Web site', ['class' => 'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::text('url', Tools::fallBack(Input::old('url'), $profile->url), ['class' => 'form-control']) }}
										{{ $errors->first('url', '<span class="text-danger">:message</span>') }}									
									</div>
								</div>
								<div class="row m-t">
									{{ Form::label('interests', 'Interests (comma separated)', ['class' => 'col-sm-3 control-label']) }}
									<div class="col-sm-6">
										{{ Form::textarea('interests', Tools::fallBack(Input::old('interests'), $profile->interests), ['class' => 'form-control']) }}
										{{ $errors->first('interests', '<span class="text-danger">:message</span>') }}									
									</div>
								</div>								
							</div>							
						</div>												

						<div class="form-group text-right">
							<button type="reset" class="btn btn-md btn-default">Cancel</button>
							<button type="submit" class="btn btn-md btn-primary">Save changes</button>
						</div>

						{{ Form::close() }}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop
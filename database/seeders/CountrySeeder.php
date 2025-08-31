<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run()
    {
        $countries = [
            [
                'id' => 1,
                'name' => [
                    'en' => 'Algeria',
                    'ar' => 'الجزائر'
                ],
                'flag' => 'dz', // رمز الجزائر
                'phone_code' => '+213',
                'capital' => 'Algiers',
                'currency' => 'DZD',
                'currency_name' => 'Algerian Dinar',
                'currency_symbol' => 'د.ج',
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'latitude' => '28.00000000',
                'longitude' => '3.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Algiers',
                        'gmtOffset' => 3600,
                        'gmtOffsetName' => 'UTC+01:00',
                        'abbreviation' => 'CET',
                        'tzName' => 'Central European Time'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => [
                    'en' => 'Bahrain',
                    'ar' => 'البحرين'
                ],
                'flag' => 'bh', // رمز البحرين
                'phone_code' => '+973',
                'capital' => 'Manama',
                'currency' => 'BHD',
                'currency_name' => 'Bahraini Dinar',
                'currency_symbol' => '.د.ب',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '26.00000000',
                'longitude' => '50.55000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Bahrain',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'AST',
                        'tzName' => 'Arabia Standard Time'
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => [
                    'en' => 'Comoros',
                    'ar' => 'جزر القمر'
                ],
                'flag' => 'km', // رمز جزر القمر
                'phone_code' => '+269',
                'capital' => 'Moroni',
                'currency' => 'KMF',
                'currency_name' => 'Comorian Franc',
                'currency_symbol' => 'CF',
                'region' => 'Africa',
                'subregion' => 'Eastern Africa',
                'latitude' => '-12.16666666',
                'longitude' => '44.25000000',
                'timezones' => [
                    [
                        'zoneName' => 'Indian/Comoro',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'EAT',
                        'tzName' => 'East Africa Time'
                    ]
                ]
            ],
            [
                'id' => 4,
                'name' => [
                    'en' => 'Djibouti',
                    'ar' => 'جيبوتي'
                ],
                'flag' => 'dj', // رمز جيبوتي
                'phone_code' => '+253',
                'capital' => 'Djibouti',
                'currency' => 'DJF',
                'currency_name' => 'Djiboutian Franc',
                'currency_symbol' => 'Fdj',
                'region' => 'Africa',
                'subregion' => 'Eastern Africa',
                'latitude' => '11.50000000',
                'longitude' => '43.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Djibouti',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'EAT',
                        'tzName' => 'East Africa Time'
                    ]
                ]
            ],
            [
                'id' => 5,
                'name' => [
                    'en' => 'Egypt',
                    'ar' => 'مصر'
                ],
                'flag' => 'eg', // رمز مصر
                'phone_code' => '+20',
                'capital' => 'Cairo',
                'currency' => 'EGP',
                'currency_name' => 'Egyptian Pound',
                'currency_symbol' => '£',
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'latitude' => '27.00000000',
                'longitude' => '30.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Cairo',
                        'gmtOffset' => 7200,
                        'gmtOffsetName' => 'UTC+02:00',
                        'abbreviation' => 'EET',
                        'tzName' => 'Eastern European Time'
                    ]
                ]
            ],
            [
                'id' => 6,
                'name' => [
                    'en' => 'Iraq',
                    'ar' => 'العراق'
                ],
                'flag' => 'iq', // رمز العراق
                'phone_code' => '+964',
                'capital' => 'Baghdad',
                'currency' => 'IQD',
                'currency_name' => 'Iraqi Dinar',
                'currency_symbol' => 'ع.د',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '33.00000000',
                'longitude' => '44.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Baghdad',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'AST',
                        'tzName' => 'Arabia Standard Time'
                    ]
                ]
            ],
            [
                'id' => 7,
                'name' => [
                    'en' => 'Jordan',
                    'ar' => 'الأردن'
                ],
                'flag' => 'jo', // رمز الأردن
                'phone_code' => '+962',
                'capital' => 'Amman',
                'currency' => 'JOD',
                'currency_name' => 'Jordanian Dinar',
                'currency_symbol' => 'د.ا',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '31.00000000',
                'longitude' => '36.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Amman',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'EET',
                        'tzName' => 'Eastern European Time'
                    ]
                ]
            ],
            [
                'id' => 8,
                'name' => [
                    'en' => 'Kuwait',
                    'ar' => 'الكويت'
                ],
                'flag' => 'kw', // رمز الكويت
                'phone_code' => '+965',
                'capital' => 'Kuwait City',
                'currency' => 'KWD',
                'currency_name' => 'Kuwaiti Dinar',
                'currency_symbol' => 'د.ك',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '29.50000000',
                'longitude' => '45.75000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Kuwait',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'AST',
                        'tzName' => 'Arabia Standard Time'
                    ]
                ]
            ],
            [
                'id' => 9,
                'name' => [
                    'en' => 'Lebanon',
                    'ar' => 'لبنان'
                ],
                'flag' => 'lb', // رمز لبنان
                'phone_code' => '+961',
                'capital' => 'Beirut',
                'currency' => 'LBP',
                'currency_name' => 'Lebanese Pound',
                'currency_symbol' => 'ل.ل',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '33.83333333',
                'longitude' => '35.83333333',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Beirut',
                        'gmtOffset' => 7200,
                        'gmtOffsetName' => 'UTC+02:00',
                        'abbreviation' => 'EET',
                        'tzName' => 'Eastern European Time'
                    ]
                ]
            ],
            [
                'id' => 10,
                'name' => [
                    'en' => 'Libya',
                    'ar' => 'ليبيا'
                ],
                'flag' => 'ly', // رمز ليبيا
                'phone_code' => '+218',
                'capital' => 'Tripoli',
                'currency' => 'LYD',
                'currency_name' => 'Libyan Dinar',
                'currency_symbol' => 'ل.د',
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'latitude' => '25.00000000',
                'longitude' => '17.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Tripoli',
                        'gmtOffset' => 7200,
                        'gmtOffsetName' => 'UTC+02:00',
                        'abbreviation' => 'EET',
                        'tzName' => 'Eastern European Time'
                    ]
                ]
            ],
            [
                'id' => 11,
                'name' => [
                    'en' => 'Mauritania',
                    'ar' => 'موريتانيا'
                ],
                'flag' => 'mr', // رمز موريتانيا
                'phone_code' => '+222',
                'capital' => 'Nouakchott',
                'currency' => 'MRU',
                'currency_name' => 'Mauritanian Ouguiya',
                'currency_symbol' => 'UM',
                'region' => 'Africa',
                'subregion' => 'Western Africa',
                'latitude' => '20.00000000',
                'longitude' => '-12.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Nouakchott',
                        'gmtOffset' => 0,
                        'gmtOffsetName' => 'UTC+00:00',
                        'abbreviation' => 'GMT',
                        'tzName' => 'Greenwich Mean Time'
                    ]
                ]
            ],
            [
                'id' => 12,
                'name' => [
                    'en' => 'Morocco',
                    'ar' => 'المغرب'
                ],
                'flag' => 'ma', // رمز المغرب
                'phone_code' => '+212',
                'capital' => 'Rabat',
                'currency' => 'MAD',
                'currency_name' => 'Moroccan Dirham',
                'currency_symbol' => 'د.م.',
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'latitude' => '32.00000000',
                'longitude' => '-5.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Casablanca',
                        'gmtOffset' => 3600,
                        'gmtOffsetName' => 'UTC+01:00',
                        'abbreviation' => 'WEST',
                        'tzName' => 'Western European Summer Time'
                    ]
                ]
            ],
            [
                'id' => 13,
                'name' => [
                    'en' => 'Oman',
                    'ar' => 'عمان'
                ],
                'flag' => 'om', // رمز عمان
                'phone_code' => '+968',
                'capital' => 'Muscat',
                'currency' => 'OMR',
                'currency_name' => 'Omani Rial',
                'currency_symbol' => 'ر.ع.',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '21.00000000',
                'longitude' => '57.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Muscat',
                        'gmtOffset' => 14400,
                        'gmtOffsetName' => 'UTC+04:00',
                        'abbreviation' => 'GST',
                        'tzName' => 'Gulf Standard Time'
                    ]
                ]
            ],
            [
                'id' => 14,
                'name' => [
                    'en' => 'Palestine',
                    'ar' => 'فلسطين'
                ],
                'flag' => 'ps', // رمز فلسطين
                'phone_code' => '+970',
                'capital' => 'Ramallah',
                'currency' => 'ILS',
                'currency_name' => 'Israeli New Shekel',
                'currency_symbol' => '₪',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '31.90000000',
                'longitude' => '35.20000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Gaza',
                        'gmtOffset' => 7200,
                        'gmtOffsetName' => 'UTC+02:00',
                        'abbreviation' => 'EET',
                        'tzName' => 'Eastern European Time'
                    ]
                ]
            ],
            [
                'id' => 15,
                'name' => [
                    'en' => 'Qatar',
                    'ar' => 'قطر'
                ],
                'flag' => 'qa', // رمز قطر
                'phone_code' => '+974',
                'capital' => 'Doha',
                'currency' => 'QAR',
                'currency_name' => 'Qatari Riyal',
                'currency_symbol' => 'ر.ق',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '25.50000000',
                'longitude' => '51.25000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Qatar',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'AST',
                        'tzName' => 'Arabia Standard Time'
                    ]
                ]
            ],
            [
                'id' => 16,
                'name' => [
                    'en' => 'Saudi Arabia',
                    'ar' => 'المملكة العربية السعودية'
                ],
                'flag' => 'sa', // رمز السعودية
                'phone_code' => '+966',
                'capital' => 'Riyadh',
                'currency' => 'SAR',
                'currency_name' => 'Saudi Riyal',
                'currency_symbol' => 'ر.س',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '25.00000000',
                'longitude' => '45.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Riyadh',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'AST',
                        'tzName' => 'Arabia Standard Time'
                    ]
                ]
            ],
            [
                'id' => 17,
                'name' => [
                    'en' => 'Somalia',
                    'ar' => 'الصومال'
                ],
                'flag' => 'so', // رمز الصومال
                'phone_code' => '+252',
                'capital' => 'Mogadishu',
                'currency' => 'SOS',
                'currency_name' => 'Somali Shilling',
                'currency_symbol' => 'Sh',
                'region' => 'Africa',
                'subregion' => 'Eastern Africa',
                'latitude' => '10.00000000',
                'longitude' => '49.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Mogadishu',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'EAT',
                        'tzName' => 'East Africa Time'
                    ]
                ]
            ],
            [
                'id' => 18,
                'name' => [
                    'en' => 'Sudan',
                    'ar' => 'السودان'
                ],
                'flag' => 'sd', // رمز السودان
                'phone_code' => '+249',
                'capital' => 'Khartoum',
                'currency' => 'SDG',
                'currency_name' => 'Sudanese Pound',
                'currency_symbol' => 'ج.س.',
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'latitude' => '15.00000000',
                'longitude' => '30.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Khartoum',
                        'gmtOffset' => 7200,
                        'gmtOffsetName' => 'UTC+02:00',
                        'abbreviation' => 'CAT',
                        'tzName' => 'Central Africa Time'
                    ]
                ]
            ],
            [
                'id' => 19,
                'name' => [
                    'en' => 'Syria',
                    'ar' => 'سوريا'
                ],
                'flag' => 'sy', // رمز سوريا
                'phone_code' => '+963',
                'capital' => 'Damascus',
                'currency' => 'SYP',
                'currency_name' => 'Syrian Pound',
                'currency_symbol' => '£',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '35.00000000',
                'longitude' => '38.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Damascus',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'EET',
                        'tzName' => 'Eastern European Time'
                    ]
                ]
            ],
            [
                'id' => 20,
                'name' => [
                    'en' => 'Tunisia',
                    'ar' => 'تونس'
                ],
                'flag' => 'tn', // رمز تونس
                'phone_code' => '+216',
                'capital' => 'Tunis',
                'currency' => 'TND',
                'currency_name' => 'Tunisian Dinar',
                'currency_symbol' => 'د.ت',
                'region' => 'Africa',
                'subregion' => 'Northern Africa',
                'latitude' => '34.00000000',
                'longitude' => '9.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Africa/Tunis',
                        'gmtOffset' => 3600,
                        'gmtOffsetName' => 'UTC+01:00',
                        'abbreviation' => 'CET',
                        'tzName' => 'Central European Time'
                    ]
                ]
            ],
            [
                'id' => 21,
                'name' => [
                    'en' => 'United Arab Emirates',
                    'ar' => 'الإمارات العربية المتحدة'
                ],
                'flag' => 'ae', // رمز الإمارات
                'phone_code' => '+971',
                'capital' => 'Abu Dhabi',
                'currency' => 'AED',
                'currency_name' => 'United Arab Emirates Dirham',
                'currency_symbol' => 'د.إ',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '24.00000000',
                'longitude' => '54.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Dubai',
                        'gmtOffset' => 14400,
                        'gmtOffsetName' => 'UTC+04:00',
                        'abbreviation' => 'GST',
                        'tzName' => 'Gulf Standard Time'
                    ]
                ]
            ],
            [
                'id' => 22,
                'name' => [
                    'en' => 'Yemen',
                    'ar' => 'اليمن'
                ],
                'flag' => 'ye', // رمز اليمن
                'phone_code' => '+967',
                'capital' => 'Sana\'a',
                'currency' => 'YER',
                'currency_name' => 'Yemeni Rial',
                'currency_symbol' => '﷼',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'latitude' => '15.00000000',
                'longitude' => '48.00000000',
                'timezones' => [
                    [
                        'zoneName' => 'Asia/Aden',
                        'gmtOffset' => 10800,
                        'gmtOffsetName' => 'UTC+03:00',
                        'abbreviation' => 'AST',
                        'tzName' => 'Arabia Standard Time'
                    ]
                ]
            ],
        ];

        foreach ($countries as $country) {
            Country::updateOrCreate(['id' => $country['id']], $country);
        }
    }
}

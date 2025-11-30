<?php

namespace App\Data;

class MenuData
{
    public static function getMenus()
    {
        return [
            // ========== MAKANAN ==========
            [
                'id' => 1,
                'name' => 'Nasi Rawon',
                'category' => 'Makanan',
                'price' => 18000,
                'image' => '🍛',
                'is_popular' => true,
                'description' => 'Rawon hitam pekat yang bikin kamu ketagihan! Kuahnya yang hitam legam bukan karena gosong ya, tapi dari kluwek yang khas. Daging empal-nya empuk banget sampai bisa dipotong pakai sendok. Dilengkapi dengan tauge segar, telur asin, dan sambal yang pedas nampol! Cocok buat kamu yang suka makanan berkuah dengan rasa yang kuat dan bikin nambah terus!',
                'testimonials' => [
                    [
                        'name' => 'Budi Santoso',
                        'rating' => 5,
                        'comment' => 'Rawonnya enak banget! Kuahnya pekat dan dagingnya empuk. Tiap pagi saya pasti mampir kesini. Harga segini worth it banget!'
                    ],
                    [
                        'name' => 'Siti Aminah',
                        'rating' => 5,
                        'comment' => 'Jujur ini rawon terenak yang pernah saya cobain di Jember. Bumbu meresap sempurna, sambalnya mantap. Recommended!'
                    ],
                    [
                        'name' => 'Andi Wijaya',
                        'rating' => 4,
                        'comment' => 'Rawonnya juara! Cuma kadang antriannya rame, tapi worth the wait sih. Next time pesen lagi!'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Nasi Soto Ayam',
                'category' => 'Makanan',
                'price' => 12000,
                'image' => '🍲',
                'is_popular' => true,
                'description' => 'Soto ayam dengan kuah kuning yang gurih dan hangat! Ayam kampungnya suwir halus, dikasih tauge rebus, soun kenyal, dan topping telur rebus. Kuahnya pas banget, nggak terlalu asin nggak terlalu hambar. Dikasih sambel terasi dan jeruk nipis biar makin seger! Perfect buat sarapan atau makan siang yang bikin perut kenyang dan hati senang. Dijamin bikin kangen!',
                'testimonials' => [
                    [
                        'name' => 'Dina Marlina',
                        'rating' => 5,
                        'comment' => 'Soto ayamnya enak dan harga ramah di kantong! Kuahnya seger, ayamnya banyak. Pelayanannya juga cepat.'
                    ],
                    [
                        'name' => 'Rudi Hermawan',
                        'rating' => 5,
                        'comment' => 'Langganan saya nih! Soto ayamnya berasa banget kunyitnya, ayamnya empuk. Top deh!'
                    ],
                    [
                        'name' => 'Putri Wulandari',
                        'rating' => 4,
                        'comment' => 'Enak! Cuma pas rame kadang lama nungguinnya. Tapi rasanya worth it kok.'
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => 'Nasi Soto Daging',
                'category' => 'Makanan',
                'price' => 15000,
                'image' => '🥘',
                'is_popular' => true,
                'description' => 'Versi upgrade dari soto ayam! Pakai daging sapi yang empuk juicy, kuahnya sama enaknya tapi lebih gurih karena kaldu dagingnya. Dagingnya dipotong tipis-tipis, empuk banget sampai meleleh di mulut. Dikasih tauge, soun, dan telur rebus. Sambel terasinya bikin makin nendang! Buat yang doyan daging wajib coba yang ini. Dijamin ketagihan dan nggak nyesel!',
                'testimonials' => [
                    [
                        'name' => 'Bambang Prakoso',
                        'rating' => 5,
                        'comment' => 'Soto dagingnya mantap! Dagingnya empuk banget, kuahnya gurih. Ini favorit saya!'
                    ],
                    [
                        'name' => 'Lina Susanti',
                        'rating' => 5,
                        'comment' => 'Porsinya banyak, harganya masih oke. Daging sopinya empuk dan banyak. Puas banget!'
                    ],
                    [
                        'name' => 'Hendra Gunawan',
                        'rating' => 4,
                        'comment' => 'Enak! Cuma agak lama nungguinnya kalau pas jam makan siang. Overall recommended sih.'
                    ]
                ]
            ],
            [
                'id' => 4,
                'name' => 'Nasi Lalapan Telur',
                'category' => 'Makanan',
                'price' => 10000,
                'image' => '🥚',
                'is_popular' => false,
                'description' => 'Menu simpel tapi bikin nagih! Nasi hangat, telur ceplok/dadar (pilih sendiri), lalapan segar (timun, kol, kemangi), dan sambal terasi yang pedesnya juara! Cocok buat kamu yang pengen makan sehat tapi tetep enak. Telurnya mateng pas, kuningnya masih meleleh kalau pecahin. Sambelnya bikin nangis keenakan! Budget friendly tapi tetap bikin kenyang dan puas. Favorit mahasiswa nih!',
                'testimonials' => [
                    [
                        'name' => 'Ria Melati',
                        'rating' => 5,
                        'comment' => 'Murah meriah tapi enak! Sambelnya mantap, lalapannya fresh. Cocok buat kantong mahasiswa.'
                    ],
                    [
                        'name' => 'Dedi Supardi',
                        'rating' => 4,
                        'comment' => 'Simple but delicious! Telurnya enak, sambelnya pedes mantap. Langganan saya ini.'
                    ]
                ]
            ],
            [
                'id' => 5,
                'name' => 'Nasi Lalapan Ayam',
                'category' => 'Makanan',
                'price' => 12000,
                'image' => '🍗',
                'is_popular' => false,
                'description' => 'Lalapan level up! Ayam goreng crispy diluar empuk didalam, bumbu meresap sempurna. Dikasih nasi hangat, lalapan segar komplit, dan sambal terasi yang bikin lidah bergoyang. Ayamnya juicy banget, kulitnya crispy tapi dagingnya tetep lembut. Sambelnya level pedas menengah tapi bisa request lebih pedes atau kurang pedes. Menu favorit buat makan siang yang bikin semangat!',
                'testimonials' => [
                    [
                        'name' => 'Tono Sugiarto',
                        'rating' => 5,
                        'comment' => 'Ayamnya crispy dan bumbu meresap! Sambelnya juara. Ini menu favorit saya setiap hari Jumat.'
                    ],
                    [
                        'name' => 'Endah Puspita',
                        'rating' => 5,
                        'comment' => 'Porsi ayamnya gede, harganya terjangkau. Lalapan segar dan sambelnya enak banget!'
                    ]
                ]
            ],
            [
                'id' => 6,
                'name' => 'Nasi Lalapan Empal',
                'category' => 'Makanan',
                'price' => 15000,
                'image' => '🥩',
                'is_popular' => false,
                'description' => 'Menu premium buat pecinta daging! Empal dagingnya empuk banget, dibumbu rempah-rempah yang khas, digoreng sampai sedikit crispy diluar tapi dalemnya tetep juicy. Disajikan sama nasi, lalapan lengkap, dan sambal terasi yang nampol. Porsi empalnya lumayan banyak dan gede-gede. Cocok buat kamu yang lagi pengen makan daging tapi dalam bentuk yang beda. Nggak nyesel deh cobain ini!',
                'testimonials' => [
                    [
                        'name' => 'Agus Prasetyo',
                        'rating' => 5,
                        'comment' => 'Empalnya empuk banget! Bumbu meresap sempurna. Ini salah satu menu terbaik disini.'
                    ],
                    [
                        'name' => 'Maya Sari',
                        'rating' => 4,
                        'comment' => 'Enak! Porsi empalnya besar. Harganya worth it dengan rasa dan porsinya.'
                    ]
                ]
            ],
            [
                'id' => 7,
                'name' => 'Nasi Lalapan Tahu Tempe',
                'category' => 'Makanan',
                'price' => 8000,
                'image' => '🥙',
                'is_popular' => false,
                'description' => 'Menu vegetarian friendly nih! Tahu dan tempe goreng garing, bumbu rempahnya meresap. Dikasih nasi hangat, lalapan segar, dan sambal terasi favorit. Tahu tempenya digoreng krispi diluar tapi masih lembut didalam. Cocok banget buat kamu yang lagi diet atau vegetarian tapi tetep pengen makan enak dan mengenyangkan. Murah meriah tapi rasanya nggak murahan!',
                'testimonials' => [
                    [
                        'name' => 'Sri Wahyuni',
                        'rating' => 5,
                        'comment' => 'Menu favorit saya! Murah, enak, dan sehat. Tahu tempenya crispy, sambelnya mantap.'
                    ],
                    [
                        'name' => 'Budi Hartono',
                        'rating' => 4,
                        'comment' => 'Simple tapi enak. Cocok buat yang lagi pengen makan ringan. Recommended!'
                    ]
                ]
            ],
            [
                'id' => 8,
                'name' => 'Nasi Goreng Jawa',
                'category' => 'Makanan',
                'price' => 12000,
                'image' => '🍳',
                'is_popular' => false,
                'description' => 'Nasi goreng khas Jawa Timur yang bikin ketagihan! Nasinya pulen, dikasih kecap manis khas Jawa yang bikin warna coklat gelap. Ada irisan ayam, telur ceplok, dan krupuk udang. Bumbu rempahnya khas, ada aroma terasi yang bikin napsu makan. Level pedesnya bisa request sesuai selera. Cocok buat makan malem atau kalau lagi bingung mau makan apa. Comfort food banget!',
                'testimonials' => [
                    [
                        'name' => 'Joko Widodo',
                        'rating' => 5,
                        'comment' => 'Nasi gorengnya enak! Bumbu meresap, porsi cukup banyak. Telur ceploknya pas matangnya.'
                    ],
                    [
                        'name' => 'Ratna Sari',
                        'rating' => 4,
                        'comment' => 'Enak dan mengenyangkan. Harganya affordable. Langganan kalau malam.'
                    ]
                ]
            ],
            [
                'id' => 9,
                'name' => 'Mie Goreng Jawa',
                'category' => 'Makanan',
                'price' => 12000,
                'image' => '🍜',
                'is_popular' => false,
                'description' => 'Buat yang lebih suka mie daripada nasi! Mie kuning goreng dengan bumbu khas Jawa yang gurih manis. Dikasih irisan ayam, sawi hijau, telur, dan taburan bawang goreng. Mienya kenyal pas nggak lembek, bumbunya meresap ke setiap helai mie. Porsi cukup banyak dan mengenyangkan. Bisa request pedes atau nggak pedes. Perfect untuk late night meal!',
                'testimonials' => [
                    [
                        'name' => 'Dewi Lestari',
                        'rating' => 5,
                        'comment' => 'Mie gorengnya juara! Tekstur mienya pas, bumbu enak. Selalu pesen ini kalau kesini.'
                    ],
                    [
                        'name' => 'Yanto Susilo',
                        'rating' => 4,
                        'comment' => 'Enak! Porsinya pas untuk makan malam. Harganya juga oke.'
                    ]
                ]
            ],
            [
                'id' => 10,
                'name' => 'Kwetiau',
                'category' => 'Makanan',
                'price' => 10000,
                'image' => '🍝',
                'is_popular' => false,
                'description' => 'Kwetiau goreng ala Waroenk Qu! Kwetiau lebar yang kenyal, digoreng dengan saus tiram dan kecap asin yang pas. Dikasih sayuran hijau segar, ayam suwir, telur, dan taburan bawang goreng. Rasanya savory dengan sedikit manis. Tekstur kwetiau-nya kenyal dan nggak lengket. Menu alternatif buat yang bosen mie atau nasi. Murah dan enak!',
                'testimonials' => [
                    [
                        'name' => 'Linda Kusuma',
                        'rating' => 5,
                        'comment' => 'Kwetiaunya enak! Teksturnya kenyal, bumbunya pas. Harga murah porsi banyak.'
                    ],
                    [
                        'name' => 'Eko Prasetyo',
                        'rating' => 4,
                        'comment' => 'Enak dan mengenyangkan. Alternatif yang bagus dari nasi goreng/mie goreng.'
                    ]
                ]
            ],
            [
                'id' => 11,
                'name' => 'Telur Asin',
                'category' => 'Makanan',
                'price' => 4000,
                'image' => '🥚',
                'is_popular' => false,
                'description' => 'Telur asin homemade yang asinnya pas! Kuning telurnya berminyak dan creamy, putihnya asinnya nggak berlebihan. Cocok banget buat tambahan lauk atau temen makan rawon. Telur asinnya mateng sempurna, kuningnya oily tapi nggak eneg. Porsi 1 butir tapi worth it buat nambahin kelezatan makan kamu. Add-on favorit pelanggan setia!',
                'testimonials' => [
                    [
                        'name' => 'Wati Susilowati',
                        'rating' => 5,
                        'comment' => 'Telur asinnya enak! Asinnya pas, kuningnya creamy. Cocok buat temen rawon.'
                    ]
                ]
            ],

            // ========== MINUMAN ==========
            [
                'id' => 12,
                'name' => 'Kopi Panas',
                'category' => 'Minuman',
                'price' => 4000,
                'image' => '☕',
                'is_popular' => true,
                'description' => 'Kopi hitam panas yang bikin melek! Kopi robusta lokal yang diseduh fresh, aromanya harum banget. Pahit-manis pas, nggak asam. Cocok buat temen sarapan atau ngobrol santai. Bisa request manis atau pahit sesuai selera. Hangatnya pas buat cuaca dingin atau hujan. Budget friendly tapi quality nggak diragukan!',
                'testimonials' => [
                    [
                        'name' => 'Pak Hadi',
                        'rating' => 5,
                        'comment' => 'Kopi langganan pagi saya! Enak, harga murah. Cocok buat temen sarapan rawon.'
                    ],
                    [
                        'name' => 'Ibu Siti',
                        'rating' => 4,
                        'comment' => 'Kopi yang enak dengan harga terjangkau. Aromanya harum.'
                    ]
                ]
            ],
            [
                'id' => 13,
                'name' => 'Kopi MIX',
                'category' => 'Minuman',
                'price' => 4000,
                'image' => '☕',
                'is_popular' => false,
                'description' => 'Kopi susu instant yang praktis dan enak! Pakai kopi mix sachet premium, manis creamy pas di lidah. Hangatnya bikin nyaman di tenggorokan. Cocok buat yang nggak suka kopi pahit tapi tetep pengen melek. Manisnya pas nggak berlebihan. Perfect buat temen ngobrol atau nemenin kerja. Murah meriah!',
                'testimonials' => [
                    [
                        'name' => 'Andi Saputra',
                        'rating' => 4,
                        'comment' => 'Kopi mix yang enak. Manisnya pas, cocok buat yang nggak suka pahit.'
                    ]
                ]
            ],
            [
                'id' => 14,
                'name' => 'Teh Manis Hangat/Es',
                'category' => 'Minuman',
                'price' => 3000,
                'image' => '🍵',
                'is_popular' => false,
                'description' => 'Teh manis klasik yang nggak pernah salah! Teh celup diseduh fresh, manisnya pas nggak bikin eneg. Bisa pilih hangat atau es sesuai mood. Hangatnya bikin nyaman, esnya bikin seger. Cocok buat temen makan apapun. Harga super affordable! Minuman wajib buat yang nggak minum kopi.',
                'testimonials' => [
                    [
                        'name' => 'Sari Dewi',
                        'rating' => 5,
                        'comment' => 'Teh manisnya enak dan murah. Manisnya pas, cocok buat temen makan.'
                    ],
                    [
                        'name' => 'Budi Atmojo',
                        'rating' => 4,
                        'comment' => 'Simple tapi enak. Harganya very affordable. Recommended!'
                    ]
                ]
            ],
            [
                'id' => 15,
                'name' => 'Jeruk Hangat/Es',
                'category' => 'Minuman',
                'price' => 3000,
                'image' => '🍊',
                'is_popular' => false,
                'description' => 'Jeruk peras segar yang bikin melek! Jeruk asli diperas manual, dikasih gula aren atau gula pasir. Asemnya seger, manisnya pas. Bisa pilih hangat (cocok buat batuk) atau es (bikin seger). Vitamin C alami buat jaga imun. Harga murah tapi manfaatnya banyak. Seger banget!',
                'testimonials' => [
                    [
                        'name' => 'Tina Kusuma',
                        'rating' => 5,
                        'comment' => 'Jeruknya seger banget! Asli peras, nggak dari sirup. Fresh dan murah.'
                    ],
                    [
                        'name' => 'Hendra Wijaya',
                        'rating' => 4,
                        'comment' => 'Enak dan seger. Cocok buat yang lagi batuk atau sekedar seger-seger.'
                    ]
                ]
            ],
            [
                'id' => 16,
                'name' => 'Pop Ice',
                'category' => 'Minuman',
                'price' => 3000,
                'image' => '🧊',
                'is_popular' => false,
                'description' => 'Es kekinian yang hits! Pop ice dengan berbagai varian rasa (taro, coklat, melon, dll). Manis seger, es serut halus, tekstur creamy pas. Cocok banget buat cuaca panas Jember. Harga murah tapi rasanya premium. Bisa jadi dessert after meal. Favorit anak-anak dan remaja!',
                'testimonials' => [
                    [
                        'name' => 'Dina Marlina',
                        'rating' => 5,
                        'comment' => 'Pop ice favorit! Enak, seger, murah. Banyak varian rasa. Recommended!'
                    ],
                    [
                        'name' => 'Reza Pratama',
                        'rating' => 4,
                        'comment' => 'Enak dan seger. Cocok buat cuaca panas. Harganya ramah kantong.'
                    ]
                ]
            ],
            [
                'id' => 17,
                'name' => 'Nutrisari',
                'category' => 'Minuman',
                'price' => 3000,
                'image' => '🍹',
                'is_popular' => false,
                'description' => 'Minuman buah instant yang seger! Nutrisari dengan berbagai rasa buah (jeruk, mangga, jambu, dll). Manisnya pas, segernya dapet, vitamin C-nya juga ada. Disajikan dingin dengan es batu. Cocok buat siang-siang atau temen makan siang. Murah dan praktis!',
                'testimonials' => [
                    [
                        'name' => 'Lina Wijaya',
                        'rating' => 4,
                        'comment' => 'Nutrisarinya enak. Manisnya pas dan seger. Cocok buat temen makan siang.'
                    ]
                ]
            ],
            [
                'id' => 18,
                'name' => 'Jeruk Hangar/Es',
                'category' => 'Minuman',
                'price' => 4000,
                'image' => '🍊',
                'is_popular' => false,
                'description' => 'Jeruk peras premium yang lebih mantap! Sama kayak jeruk biasa tapi dengan jeruk yang lebih bagus dan lebih banyak. Seger maksimal dengan rasa asam manis yang balanced. Bisa hangat atau es. Cocok buat yang mau extra vitamin C atau emang lagi haus banget. Worth the extra price!',
                'testimonials' => [
                    [
                        'name' => 'Agus Salim',
                        'rating' => 5,
                        'comment' => 'Jeruknya lebih seger dari yang biasa. Porsi lebih banyak. Worth it!'
                    ]
                ]
            ]
        ];
    }

    public static function getPopularMenus()
    {
        return array_filter(self::getMenus(), function($menu) {
            return $menu['is_popular'] === true;
        });
    }

    public static function getMenusByCategory($category)
    {
        if ($category === 'Semua') {
            return self::getMenus();
        }
        
        return array_filter(self::getMenus(), function($menu) use ($category) {
            return $menu['category'] === $category;
        });
    }

    public static function getMenuById($id)
    {
        $menus = self::getMenus();
        foreach ($menus as $menu) {
            if ($menu['id'] == $id) {
                return $menu;
            }
        }
        return null;
    }

    public static function getCategories()
    {
        return [
            [
                'name' => 'Makanan',
                'icon' => '🍛',
                'description' => 'Menu makanan lengkap dan mengenyangkan'
            ],
            [
                'name' => 'Minuman',
                'icon' => '☕',
                'description' => 'Minuman segar dan hangat'
            ]
        ];
    }
}

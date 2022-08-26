<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/screenshots/dde/dde292d2a00622f1dfe1252d25686e50.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/screenshots/ada/adad84fb1be36b0fffa0c9ee78272828.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/screenshots/5f4/5f4858e487d8a7fa3c90ccc7b4948141.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/screenshots/e23/e23e5d075f603c408d36448e85b47583.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/screenshots/bb6/bb6aac43cc57267ce6a04113242d8425.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/screenshots/dc7/dc732539993f4ef8bf0c679c86cce513.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 1,
                'url' => 'https://media.rawg.io/media/games/ec0/ec0e75d783dcd78a3f9367a57b87ac97.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/screenshots/eb5/eb5a0522dbb56b8f698ac3fa8b884341.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/screenshots/b0f/b0f8ff8c24bc46ca70a20ee4b83d9569.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/screenshots/276/276688cddf9531e6cbcccc3368dfa25f.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/screenshots/585/585fd40ad660779a79e2853f3cd7a833.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/screenshots/7cb/7cb256eecd9dd0bb54d4524dc2a9b7ee.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/screenshots/464/464f718f300f321d481b0ac17b1ae9cb.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 2,
                'url' => 'https://media.rawg.io/media/games/71d/71df9e759b2246f9769126c98ac997fc.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 3,
                'url' => 'https://media.rawg.io/media/screenshots/aec/aecf50e5c79a1edc2c4cb59ca60d65d0.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 3,
                'url' => 'https://media.rawg.io/media/screenshots/d51/d5163c0ca2ded1fabe12ee899781b42a.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 3,
                'url' => 'https://media.rawg.io/media/screenshots/1db/1db5e4e70a5b39e6332ecb253873da84.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 3,
                'url' => 'https://media.rawg.io/media/screenshots/a60/a606bb1177f31e26d46b3b12b5acbb1b.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 3,
                'url' => 'https://media.rawg.io/media/games/34e/34eb79862b32835924d999d575e08202.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 4,
                'url' => 'https://media.rawg.io/media/screenshots/080/080811a1ecb946d4303cdebed8b666a2.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 4,
                'url' => 'https://media.rawg.io/media/screenshots/4ae/4aec1b0204698386ad984fa6c98f7a86.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 4,
                'url' => 'https://media.rawg.io/media/screenshots/de1/de152b39a1d455eaaa8c01a0d10038bb.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 4,
                'url' => 'https://media.rawg.io/media/games/cd2/cd28a066e3a8d602e1ebbff8111fd10a.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/screenshots/ad4/ad4113d36dcd4657e5232878d3894174.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/screenshots/a89/a89a3d14c4152071068346e49483e795.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/screenshots/b19/b19087463efae3f6089d508210603460.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/screenshots/1cd/1cd02d4aa7260ffd1fb70c249cd7e57f.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/screenshots/97c/97cd006c2450da3b1412407daf4c4159.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/screenshots/9c2/9c282641e6d50d7f61c3ded550061221.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 5,
                'url' => 'https://media.rawg.io/media/games/43e/43e1a4f86ff59d70624d7e7c608e58c3.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/screenshots/753/753a16b1f734bb587eade9f3fb1af1f5.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/screenshots/2b9/2b950035e30f0e9f8f9f7177e7a17877.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/screenshots/8c2/8c24dfafc53688d82a94e241fa107a47_9AtiPab.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/screenshots/f9e/f9e4aecc371f807bd9a702cbea25a0c9.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/screenshots/904/9048c6f76da5c675e8f0d04d3a76ccb1.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/screenshots/ac2/ac28077441c853ab54b6d0699a4e7219.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 6,
                'url' => 'https://media.rawg.io/media/games/0bc/0bccb296edb7f1757bd0923252fa95b5.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/screenshots/52a/52ab56f49dacec085803b93e20cde2d8.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/screenshots/4ef/4ef5d976b974873c574126ed3e081f99.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/screenshots/3eb/3eb910c77a5597197276f3ea541916d2.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/screenshots/3ea/3eadccae65f82027a0e0ddc1f4ea5d52.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/screenshots/ea6/ea669a514a8fdd905b5d67384561014b.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/screenshots/441/44158afb4810a7141760dc3b03d143ba.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 7,
                'url' => 'https://media.rawg.io/media/games/d44/d44e61bcf1497745e8bf09fe1d7a2d7b.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/screenshots/000/000b26be5202b0ea6dd30c675dcf9b06.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/screenshots/e85/e850e38f338344125b259a68b1cc5d32.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/screenshots/a38/a3855e089574c7007f387497ba977721.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/screenshots/9b3/9b316e3d515f36330ccc5e4ad5ddc870.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/screenshots/dc2/dc232d0d1b8d72ed6de5adfc0a439711.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/screenshots/870/870cb29466d95cfd9dfdff4cc8c88bc0.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 8,
                'url' => 'https://media.rawg.io/media/games/48d/48da9c403b56050377a8d335ab7bb79b.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 9,
                'url' => 'https://media.rawg.io/media/screenshots/758/7582c98b2001c2eaca1cb92223b6acca.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 9,
                'url' => 'https://media.rawg.io/media/screenshots/4b7/4b7b8d5e80b01a75a68595f05ccf6494.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 9,
                'url' => 'https://media.rawg.io/media/games/bdd/bdd410bf4cad84ca04101e6fa6e94b43.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/2a6/2a6c446519ae78e58c1888cc7eae68c8.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/8ef/8ef3a00df03fd647f7bba01766b44016.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/ac6/ac602ecb0a12695a24d71a656147ffb5.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/806/806ab6bdbbff35a57af9eddfd6790294.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/5c0/5c06976209bfa78c33bb4bc908d0140a.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/317/31743dad647fb166abd9fd47a3532249.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 10,
                'url' => 'https://media.rawg.io/media/screenshots/f19/f1910be236c845383697af9daf5a41e7.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/f48/f4863a1ee6a5b333d2fa345ab19c7c75.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/6a1/6a152e233e75f07aa47741d40ee29ea5.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/e63/e633e9ad9ba3b3ac077690a2854e8b70.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/31a/31abf07f2019fcae43cefcc32302e2cc.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/44b/44b882d58b75338e6ba55a1b58410ace.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/7c9/7c9daef4a547e4eedc468c8e1ddd6e82.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 11,
                'url' => 'https://media.rawg.io/media/screenshots/178/178b33bf8487ca9978be2680ab0634d6.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/b46/b46988cf550dac395c996ec977ead023.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/1de/1de8c83fe819421bba120e3c474f439c.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/45e/45e4e49eb81bc6cc1cba8e5bd28debdf.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/b4b/b4b2bbf7669484a8d4530b592f9b0930.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/faa/faaff962f116e194bc4a706f20710b1e.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/af3/af31c14d05d2d349365460f629315b68.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 12,
                'url' => 'https://media.rawg.io/media/screenshots/05c/05c3c4a7c7cc904724d75272a64d65b4.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/screenshots/880/88040e5f24d51d6eb6aab3c2955da406.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/screenshots/353/353c727b43952b25a9d9359b6868722a.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/screenshots/690/690e472103ced1d952eddb9aaa51a39e.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/screenshots/bdc/bdcae9c0da2531c4f16b54b6581c87f8.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/screenshots/2ad/2ad274687cd8af8848911a7434e51bc9.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/screenshots/73e/73e0941c8d9dab03e0b47073ace249c4.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 13,
                'url' => 'https://media.rawg.io/media/games/6f3/6f34131554c961f0ff37ed476e939252.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/screenshots/a5a/a5aeb74b7db22b5d935bf1e2139631e4.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/screenshots/64a/64af42927123c71fa3ec0bd7686a3071_bHp8l4j.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/screenshots/1f9/1f969ae0be5b3e03eb219468f8307367.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/screenshots/f57/f572dc724cc431e89bd1cbf1c327f330.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/screenshots/7a9/7a96931991966267e72472228048f315.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/screenshots/9aa/9aaede891b50eebba9622d401dbc5215.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 14,
                'url' => 'https://media.rawg.io/media/games/8a1/8a1465b48b728a68c2b8b88d5f37a16a.jpg',
                'type' => 'cover',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/127/12711eecc130f12b5236109b2946221b.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/e97/e97367b6ff970fd14a27bba85f9cf5d6.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/a4f/a4f293cf24b6cca4cd1b5341b3fbe94c.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/bb1/bb1f99fb1199f7fdad23ef5b4cdc9051.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/8e0/8e093390b3837327a6dc7d84e0849aa1.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/761/761ebb7e5f5e20e1afb1a184e4828051.jpg',
                'type' => 'screenshot',
            ],
            [
                'game_id' => 15,
                'url' => 'https://media.rawg.io/media/screenshots/761/761ebb7e5f5e20e1afb1a184e4828051.jpg',
                'type' => 'cover',
            ],
        ]);
    }
}

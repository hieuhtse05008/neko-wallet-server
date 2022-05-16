<?php


namespace App\Enum;


final class FAQs
{
    const items = [
        [
            'question' => "Which chains does NEKO support? ",
            'answer' => "NEKO wallet is a multi-chain wallet.
We support tokens in SOLANA, BNC, and Ethereum. Neko Wallet currently supports NFT on SOLANA. For NFT on BNC and Ethereum, please kindly wait for our next update. ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "I sent token to a wrong wallet address ? ",
            'answer' => "NOTE:
Because of the the decentralized nature of blockchains, all transactions made on the blockchain are final and irreversible.

If you sent token to a wrong address, it is gone. Neko team cannot get access to any user's wallet. Hence, we can not help you to get your token back. Neko team cannot share information of wallet user. Hence, in this case, we are sorry that we can do nothing about it. ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "How to report a scam ? ",
            'answer' => "At Neko, we strive to provide safe and secure services for our users. The success and development of our products come from Neko's strong community.
If you are aware or in suspicion of any act of scam, please help report it. Neko team will try our utmost to prevent any activities of scam and minimize the consequences.

You can report a scam by going directly to warn our NEKO APP Community in Discord: (https://discord.gg/vnjFDbkC)
 Our Mods will be available to take care of the report in a timely manner.

Please noted that, any transaction made are irreversible. Neko Team cannot help you to take back the fund or un-do the transaction; but your report will help to track the scammers and prevent losses for other users.

As other non-custodial wallets, Neko have no obligation to provide compensation for the same. ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "Why cant I not send token, why does my transaction fail? ",
            'answer' => "NOTE:
All transactions requires transaction fee called gas fee.

There are a few reasons why your transaction may fail:
First, your balance is not enough for gas fee. A minimum of 0.05 SOL should be kept in wallet to pay for gas fee.
Second reason for the failure of transaction may due to congestion of the network. You may come back later and re-send our tokens or NFT's
Some other reasons may come from errors or bugs in our Wallet. In this case, please make a BUG REPORT so that our team can handle it asap for you. ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "Why doesn't my NFT show up? ",
            'answer' => "At the moment, Neko only supports NFT on SOLANA. If you have NFT from other chains, it will not appear on app. In the next update, Neko app will be able to support NFT from BSC and Ethereum.

If your NFT from SOLANA, and it still does show up, there is a good chance that it does comply with the Solana NFT standard. It may be missing the metadata required to be displayed properly.

Our recomendation is that you contact the respective NFT project and let them know.",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "Why doesn't my SFT show up? ",
            'answer' => "At the moment, Neko has not support SFT. Please kindly wait for our next update for this feature ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "I imported my wallet but some accounts are missing. How can I restore all of my account? ",
            'answer' => "The easiest way to restore all of your accounts is to make sure each account has some SOL in it so that NEKO can detect it. Follow these steps and let me know if your issue is resolved:

1. Make sure your Secret recovery Phrase is written down correctly and backed up
2. Send a little SOL to each account you would like to restore
3. Go into Settings, scroll down and click the red button that says \"Reset Secret recovery Phrase\"
4. Re-import your wallet using your Secret recovery Phrase
5. All of your accounts should be detected and available through Phantom again
6. In a future release, we will be adding some functionality to make this process a lot better and Phantom will be much smarter at detecting your wallets. I hope this helps! ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "Is Neko available on mobile, iOS or Android?",
            'answer' => "YES! Neko is available on both iOS and Android. Here is the link to download it:
- iOS (gắn link sau khi lên store)
- Android

Warning: Be aware of scammers. Using a fake Neko app will result in your funds being stolen. Please help us by reporting these apps when you see them. To know how to report a scam, please follow \"this instruction\" (dẫn link bài hướng dẫn report scam\".)",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "What if I forgot my Neko password? ",
            'answer' => "You can reset your password on each device using your Secret Recovery Phrase.

First, you need to delete your Neko app in your device and then download it again. You can reset your password using your Secret Recovery Phrase.

Warning: If you forget your Secret recovery Phrase, there is nothing Neko team can do to help you access your wallet. Your wallet is lost forever. ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "What is a secret recovery phrase? ",
            'answer' => "Secret recovery Phrase is a unique 12-word phrase that is generated when you first set up a wallet. Secret Recovery Phrase is also known as or called seed phrase or mnemonic.
Secret Recovery Phrase is very important. Anyone with your Secret Recovery Phrase can access to your wallet. If you forget your Secret Recovery Phrase, you cannot get access to your wallet again.
It is recommended to save your Secret Recovery Phrase in a safe place.

Warning: DO NOT share your Secret Recovery Phrase with anyone! If someone has access to your Secret Recovery Phrase, they will have access to your wallet. Neko support will NEVER ask you for your secret phrase or your private key.",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "What if I forgot my Secret recovery Phrase?",
            'answer' => "Warning: DO NOT share your Secret Recovery Phrase with anyone! If someone has access to your secret phrase, they will have access to your wallet. Neko support will NEVER ask you for your secret phrase or your private key.

If you forget your Secret Recovery Phrase, there is nothing Neko team can do to help you. ",
            'note' => "",
            'warning' => "",
        ],
        [
            'question' => "Does Neko keep my Secret Recovery Phrase? ",
            'answer' => "No! Neko Team does not keep your Secret Recovery Phrase. Your Secret Recovery Phrase only exists in form of encrypted database and no one can get access to it. ",
            'note' => "",
            'warning' => "",
        ],

    ];

}

# Ajax-Php-Tabloda-Veri-Guncelleme
 Ajax ve Php kullanarak tablolarımızı sayfayı yenilemeden güncelliyoruz

Ekran Çıktısı resimdeki gibidir .. 
***************************
![1](https://user-images.githubusercontent.com/34952020/132058106-f9d1e8cf-786a-4e94-bb49-e408189b12cc.PNG)
![2](https://user-images.githubusercontent.com/34952020/132058108-bd2f2f95-4b90-4eaf-bd6b-4d61e2c26c95.PNG)


**********************
SQL İmport Edin
**********************

CREATE TABLE `konular` (
  `id` int(11) NOT NULL,
  `konu_baslik` varchar(255) NOT NULL,
  `konu_aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `konular` (`id`, `konu_baslik`, `konu_aciklama`) VALUES
(1, 'osman', 'osman mesajı'),
(2, 'mehmet', 'mehmet mesajı'),
(3, 'kamil', 'kamil mesajı');




CREATE DATABASE `clothes_shop`;
USE `clothes_shop`;

SET time_zone = "+07:00";


CREATE TABLE `contact` (
    `contact_id` INT UNSIGNED AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `message` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255),
    `phone` VARCHAR(15),
    `email` VARCHAR(255),
    PRIMARY KEY (`contact_id`)
);

CREATE TABLE `news` (
    `news_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(100) NOT NULL,
    `sub_title` MEDIUMTEXT DEFAULT NULL,
    `content` LONGTEXT NULL,
    `postURL` MEDIUMTEXT DEFAULT NULL,
    `postImage` VARCHAR(255) DEFAULT NULL,
    `postDate` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`news_id`)
);

INSERT INTO `news` (`news_id`, `title`,`author`, `sub_title`,  `content`, `postURL`, `postImage`, `postDate`) VALUES 
(
    11, 
    'THE BEST TENNIS CLOTHING BRANDS TO HELP YOU ACE YOUR COURT STYLE',  
    'Arden Fanning Andrews', 
    'The best tenniswear brands are very aware of 2022’s fashion-first take on courtside dressing.',
    '<p>The best tenniswear brands are very aware of 2022’s fashion-first take on courtside dressing. After seasons dominated by high-design athleisure and balletcore, tenniscore has emerged as this year’s answer to a string of anything-can-be-core revivals inspired by classic sports aesthetics. According to industry insiders and experts creating the latest collections, there’s a logic behind this slice of inspiration.</p>
    <p>“Tennis has always been associated with elegance, including from a sartorial point of view,” says Catherine Spindler, chief brand officer of Lacoste. Spindler acknowledges that style codes are influencing traditional fashion houses and making their way far beyond the country club. Spindler points out that former tennis champion René Lacoste founded the brand in 1933 with deep roots in the sport—he developed a ball-throwing machine for training solo and later invented the polo shirt, “which has become a fashion icon adopted by all.” Now, these “sporty influenced pieces are worn in a professional environment as well as for an evening out,” she says.</p>',
    'https://www.vogue.com/article/best-tennis-brands', 
    'img/news/news-11.jpg',
    'June 8, 2022'
),

(
    12, 
    "FALL 2022 WOMEN'S CAMPAIGN", 
    'Fabien Baron', 
    'Dior unveils images from the campaign for the Fall 2022 collection by Maria GraZia Chiuri', 
    "<p>With her Dior Fall 2022 line, Maria Grazia Chiuri initiated a dialogue between the history of Dior and the contemporary world, which has now been brought to life through group portraits shot by Alice Mann. The campaign reflects a renewed sense of self-affirmation, highlighting a powerful, multiform femininity. It pays homage to the fascinating figures who contributed to Monsieur Dior’s success, from sister Catherine to muse Mizza Bricard and loyal collaborator Marguerite Carré. </p>
    <p>The emblematic Dior family burlap bags have been transformed into a symbol of sisterhood – in keeping with a major inspiration for the line, namely uniforms – with the motto “L'union fait la force” (“Strength through unity”) adorning skirts and jackets, alongside the iconic Dior Book Tote. The daring looks come alive for the South African artist’s lens, expressing fundamental values such as togetherness and sharing. </p>",
    'https://www.dior.com/en_vn/fashion/news-savoir-faire/folder-news-and-events/fall-2022-womens-campaign', 
    'img/news/news-12.jpg', 
    'June 10, 2022'
),
(
    13,
    "GOING ON HOLIDAY? YOU'LL NEED SOME VACATION-WORTHY JEWELRY WHILE YOU'RE IN PARADISE",
    'Madeline Fass',
    'Dressing for vacations has a different look and feel than the typical day-to-day summer style.',
    "<p>Dressing for vacations has a different look and feel than the typical day-to-day summer style. Let’s face it: Going on holiday is the perfect excuse to dress in fantastical, destination-worthy fashions, like dreamy caftans, tropical evening bags, or a pair of raffia-heel sandals. It’s also the best time to take advantage of the playful summer capsule and resort collections designers offer each season. And there’s no shortage of brands whose entire existence depends on dressing us in fabulous vacation wear.</p>
    <p>But the easiest way to get that on-holiday look is via summer jewelry that instantly makes you feel like you’re in paradise (even when you’re not). Look to artisanal and handcrafted baubles to transform any ordinary summer outfits into extraordinary resort looks. We’re calling it vacation jewelry, and the genre consists of artful statement necklaces made of wooden charms, beads, macramé, or neutral stones strung on textile strands. For vacation earrings, think super-dangly drops embellished with earthy rattan, wood, and seashells that nod to the natural island scenery that, hopefully, surrounds you.</p>",
    'https://www.vogue.com/slideshow/vacation-jewelry',
    'img/news/news-13.jpg',
    'June 7, 2022'
),
(
    14,
    "26 IMPRESSIONIST FLORAL DRESSES THAT ARE AS PRETTY AS A PAINTING",
    'Kristina Rutkowski',
    'Florals are not necessarily a groundbreaking concept, but there was a painterly quality to the print this season that seemed almost Impressionist era-inspired.',
    "<p>Florals are not necessarily a groundbreaking concept, but there was a painterly quality to the print this season that seemed almost Impressionist era-inspired. Since most designer’s mood boards begin with a piece of artwork as a reference, it comes as no surprise that our favorite floral prints for summer could have been plucked from a Claude Monet masterpiece or straight from a Pierre-Auguste Renoir landscape. When applied to a romantic yet modern day silhouette, Impressionist floral dresses are the no-fail option when creating a dreamy summer wardrobe lineup.</p>
    <p>There are a few key points to remember when looking for your own perfect frock. This trend, of course, is all about a muted pastel color palette inspired by the movement itself. Plenty of volume, ruffles, and gathered layers are necessary when it comes to construction, and a floor-sweeping gown or midi-length is a must when it comes to hemlines. Sweet smocking and pleats hit all the high notes, and an attention to trimmings—from lace to satin ribbons—further expand upon the charming mood of the trend. Make sure to look for modern shapes that will transform these prints from the past to present.</p>",
    'https://www.vogue.com/slideshow/impressionist-floral-dresses',
    'img/news/news-14.jpg',
    'May 16, 2022'
),
(
    15,
    "STREET STYLE'S 'IT' BAGS OF FALL 2022",
    'Irene Kim',
    'It bags come in all shapes and sizes. Top handles and increasingly larger size bags began to make their mark, and the Balenciaga moto remained in the fast lane.',
    '<p>It bags come in all shapes and sizes. Top handles and increasingly larger size bags began to make their mark, and the Balenciaga moto remained in the fast lane. Adding a twist to the street style picture this season were curvy bags from the likes of Prada, Chanel, and Coperni.</p>
    <p>See the bags our global street stylers carried for fall below, and check out more of the best accessories in the Street Style Trend Tracker.</p>',
    'https://www.vogue.com/article/street-style-fashion-week-trends-it-bags-of-street-style-fall-2022',
    'img/news/news-15.jpg',
    'March 19, 2022'
),
(
    16,
    "10 TRENDS FROM THE FALL 2022 SEASON THAT PUSH FASHION FORWARD",
    'Steff Yotka',
    'The front rows, as usual, made the headlines at the fall 2022 runway shows.',
    "<p>The front rows, as usual, made the headlines at the fall 2022 runway shows. Kim Kardashian wowed at Prada and Balenciaga, and all eyes were on Rihanna at Gucci, Off-White, and Christian Dior. But now that the season is over, what Vogue editors around the world can’t stop talking about is the fashion. From New York to Paris, the garments that designers proposed have a revitalized pragmatism and grace, with none—or at least fewer—of the logos, wacky prints, or gimmicky silhouettes that have defined recent seasons. </p>
    <p>Fall 2022’s best clothes are pieces to live in that reflect their wearer’s sense, intellect, and beauty. Designers rebelled against last year’s minis with hemlines that dropped to the floor, creating statuesque shapes at Saint Laurent and Rick Owens. Suits were defined by genderless, oversized blazers that hung from widened shoulders at Prada and Louis Vuitton. Lingerie dressing was toughened up with crystals and embellishments at Miu Miu and Paco Rabanne, and corsets took on protective forms at Christian Dior and Balmain. In many ways, fashion went back to basics—the suit, the skirt, the slip dress, and an overwhelming number of white shirts or tank tops styled with medium-wash jeans. </p>",
    'https://www.vogue.com/article/fall-2022-fashion-week-trend-report',
    'img/news/news-16.jpg',
    'March 15, 2022'
)
;
 



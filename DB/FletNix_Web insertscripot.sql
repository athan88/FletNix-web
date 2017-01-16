go
use FletNix_Web
go

/*insertscript only inserts 9 movies for testing purposes*/


/*overview of all data in the Movie table*/
select* from Movie



/*inserting the data*/
go
delete 
from Movie

go


/*inserting Movies*/
go
insert into Movie 

values
(1, 'Stranger Things', NULL, 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying forces in order to get him back.', 2016, 'Images/Stranger_Things.jpg', NULL, 'https://www.youtube.com/embed/XWxyRG_tckY', 1),
(2, 'House Of Cards', NULL, 'A Congressman works with his equally conniving wife to exact revenge on the people who betrayed him.', 2013, 'Images/House_Of_Cards.jpg', NULL, 'https://www.youtube.com/embed/NTzycsqxYJ0', 1),
(3, 'Breaking Bad', NULL, 'A High school chemistry teacher diagnosed with inoperable lung cancer turns to manufacturing and selling methamphetamine in order to
    secure his family''s future', 2008, 'Images/Breaking_Bad.jpg', NULL, 'https://www.youtube.com/embed/HhesaQXLuRY', 1),
(4, 'Interstellar', NULL, 'A team of explorers travel trough a wormhole in space in an attemt to ensure humanity''s survival.', 2014, 'Images/Interstellar.jpg', NULL, 'https://www.youtube.com/embed/zSWdZVtXT7E', 0), 
(5, 'The Dark Knight', NULL, 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, the caped crusader must come to terms with one fo the greatest psychological tests of his ability to fight injustice.', 2008, 'Images/The_Dark_Knight.jpg', NULL, 'https://www.youtube.com/embed/EXeTwQWrcwY"', 0)

go



/*inserting Users*/
SELECT customer_mail_adres FROM FletNix.dbo.Customer WHERE customer_mail_adres = 'testuser@testmail.com' AND password = 'testpwd'

select* from Customer


go
insert into Customer
values
('testuser@testmail.com','testuser','testaccountpaypal','1-9-2017',NULL,'testpwd'),
('testuser@testmail.com2','testuser2','testaccountpaypal2','1-9-2017',NULL,'testpwd2'),
('admin','admin','admin','1-15-2017',NULL,'$2y$10$C8G6jmutKAWecicgx3Y.6OUTAWQAqDayd9G2KuukaOp/RZEkNYYYW')
go


/*inserting the ratings*/
select * from Movie_rating


go
insert into Movie_rating 
values
('testuser@testmail.com',1,5),
('testuser@testmail.com2',1,3)
go

select * from Movie

select avg(Movie_rating.rating)
FROM Movie JOIN
Movie_rating ON Movie.movie_id = Movie_rating.Movie_id 
group by Movie.movie_id

insert  FletNix_Web.dbo.Genre

select  distinct 

		left(Genre,255)					as genre_name,
        null							as [description]

from    MYIMDB.dbo.Imported_Genre

SELECT Movie.movie_id, Movie.title, Movie.duration, Movie.[description], Movie.publication_year, Movie.cover_image, Movie.previous_part, Movie.[URL], Movie.series
                            FROM Movie 
                            LEFT JOIN Movie_genre 
                            ON Movie.movie_id = Movie_genre.movie_id
                            LEFT JOIN Movie_cast
                            ON Movie_cast.movie_id = Movie.movie_id
                            LEFT JOIN Person 
                            ON Person.person_id = Movie_cast.person_id
                            LEFT JOIN Movie_director 
                            ON Person.person_id = Movie_director.person_id
                            WHERE Movie.movie_id IS NOT NULL AND (Movie.title like 'test' OR Movie_genre.genre_name like '%$keyword%' OR Movie.publication_year = $keyword 
                            OR person.firstname like '%$keyword%' OR person.lastname like'%$'
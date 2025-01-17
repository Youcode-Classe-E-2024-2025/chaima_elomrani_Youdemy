CREATE DATABASE IF NOT EXISTS youdemy ;
USE youdemy;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    role ENUM ('Student','Teacher','ADMIN') NOT NULL 
);

CREATE TABLE Course(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    image_path TEXT,
    video_path TEXT,
    price VARCHAR(200),
    category_id INT,    
    Teacher INT ,
    FOREIGN KEY (category_id) REFERENCES Category(id) 
    FOREIGN KEY (teacher_id) REFERENCES users(id) ; 
);

CREATE TABLE Category(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name VARCHAR(255)
);


CREATE TABLE Tag(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    title VARCHAR(255)
);


CREATE TABLE Tag_to_course(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    course_id INT, 
    tag_id INT, 
    FOREIGN KEY (tag_id) REFERENCES Tag(id) ,
    FOREIGN KEY (course_id) REFERENCES Course(id) 
);


CREATE TABLE Inscription(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    inscription_date DATE,
    student_id INT,
    course_id INT,
    FOREIGN KEY (student_id) REFERENCES Users(id),
    FOREIGN KEY (course_id) REFERENCES Course(id)

);


INSERT INTO Category (name) VALUES
('Web Development'),
('Data Science'),
('Design'),
('Marketing'),
('Business');

INSERT INTO Tag (title) VALUES
('Frontend'),
('Backend'),
('JavaScript'),
('Python'),
('Machine Learning'),
('SEO'),
('Marketing Strategy'),
('UI/UX'),
('Database');

INSERT INTO Users (name, email, password, role) VALUES
('Alice Johnson', 'alice@you.com', 'password123', 'Student'),
('Bob Smith', 'bob@you.com', 'password123', 'Teacher'),
('Charlie Davis', 'charlie@you.com', 'password123', 'ADMIN'),
('David Wilson', 'david@you.com', 'password123', 'Student'),
('Emma Brown', 'emma@you.com', 'password123', 'Teacher');


INSERT INTO Course (title, description, image_path, video_path, category_id) VALUES
('Intro to Web Development', 'Learn the basics of HTML, CSS, and JavaScript to build your first website.', 'web_dev_image.jpg', 'web_dev_video.mp4', 1),
('Data Science for Beginners', 'Get started with data analysis and visualization using Python and Jupyter notebooks.', 'data_sci_image.jpg', 'data_sci_video.mp4', 2),
('UX/UI Design Principles', 'Learn the fundamental principles of creating user-friendly interfaces.', 'ux_ui_image.jpg', 'ux_ui_video.mp4', 3),
('SEO Basics', 'Master the art of search engine optimization and drive traffic to your website.', 'seo_image.jpg', 'seo_video.mp4', 4),
('Entrepreneurship 101', 'Learn how to build and scale your own business from scratch.', 'business_image.jpg', 'business_video.mp4', 5);

INSERT INTO Tag_to_course (course_id, tag_id) VALUES
(1, 1), 
(1, 3), 
(2, 4), 
(2, 5), 
(3, 8), 
(4, 6), 
(5, 7), 
(5, 9); 

INSERT INTO Inscription (inscription_date, student_id, course_id) VALUES
('2025-01-01', 1, 1), 
('2025-01-02', 4, 2), 
('2025-01-03', 1, 5),
 ('2025-01-04', 2, 3), 
('2025-01-05', 1, 4); 



INSERT INTO course (price)
VALUES
(100), 
(150), 
(200), 
(250), 
(300);


ALTER TABLE course
ADD status VARCHAR(200);

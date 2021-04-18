import { Link } from 'react-router-dom';
import { Col, Row } from 'react-bootstrap';
import { FaStar, FaRegStar } from 'react-icons/fa';

function CoursesItem({coursesCategory, allCourses}) {
  const path = '/images/courses-page/';

  
  const courses = [
    {id:1, title:"web", category:'CS', image: path+'web.png', rate:5},
    {id:2, title:"arduino", category:'Power', image: path+'arduino.png', rate:5},
    {id:3, title:"solar", category:'Mechanics', image: path+'solar.png', rate:5},
    {id:4, title:"solar", category:'Mechanics', image: path+'solar.png', rate:5},
  ];

  if(coursesCategory === 'all' || allCourses) {
    var currentCourses = courses;
  } else {
    var currentCourses = courses.filter(course=> course.category === coursesCategory);
  }

  return (
    <>
      <div className="courses-items">
        <Row className="justify-content-center align-items-center">
          {currentCourses.map((course, index)=> {
            return (
              <Col key={course.id} lg={allCourses ? 3 : 4} md={6} sm={12} className={allCourses && index%2!=0 ? "mb-3 mt-lg-5" : "mb-3"}>
                <Link to={"/course/"+course.id} className="card-img-top"><div  className="card-img"><img  className="w-100" src={course.image} alt="course" /></div></Link>
                <div className="card-body">
                  <h5 className="card-title">{course.title}</h5>
                  <p className="card-text"><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaStar className="d-inline-block rate-icon" /><FaRegStar className="d-inline-block rate-icon" /></p>
                  <Link to={"/course/"+course.id} className="text-secondary">See Full Course</Link>
                </div>
              </Col>
            );
          })}
        </Row>
      </div>
    </>
  )
}
  
export default CoursesItem

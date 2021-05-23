import React, { useContext, useEffect } from 'react';
import { Link, withRouter} from 'react-router-dom';
import { Col, Row, Spinner } from 'react-bootstrap';
import { FaStar, FaRegStar } from 'react-icons/fa';
import { CoursesContext } from "../Contexts/CoursesContext";

function CoursesItem(props) {
  const path = '/images/courses-page/';

  const {loading, courses, getCoursesByCategoryId} = useContext(CoursesContext);

  useEffect(() => {
    if(props.match.params.category) {
      getCoursesByCategoryId(props.match.params.category);
    }
    // console.log(props.otherCourses);
  }, [props.match.params.category]);

  // useEffect(() => {
  //   if(course.category_id) {
  //     getCoursesByCategoryId(course.category_id);
  //   }
  //   // console.log(props.otherCourses);
  // }, [course]);

  return (
    <div className="courses-items">
      <Row className="justify-content-center align-items-center">
        {loading && (
          <Col xs={12}>
            <Spinner />
          </Col>
        )}

        {courses.length === 0 && !loading ? (
          <Col xs={12}>
            <h2 className="not-found text-danger text-center">There is no Courses</h2>
          </Col>
          ) : courses.map((course, index)=> {
            return (
              <Col key={course.id} lg={props.allCourses ? 4 : 3} md={6} sm={9} className={!props.allCourses && index%2!=0 ? "mb-3 mt-lg-5" : "mb-3"}>
                <Link
                  to={"/course/"+course.id}
                  className="card-img-top"
                >
                  <div  className="card-img"><img  className="w-100" src={'/'+course.image} alt="course" /></div>
                </Link>
                <div className="card-body">
                  <h5 className="card-title">{course.name}</h5>
                  <p className="card-text">
                      <FaStar className="d-inline-block rate-icon" />
                      <FaRegStar className="d-inline-block rate-icon" />
                  </p>
                  <Link
                    to={"/course/"+course.id}
                    className="text-secondary"
                  >
                    See Full Course
                  </Link>
                </div>
              </Col>
            );
          })
        }
      </Row>
    </div>
  )
}

export default withRouter(CoursesItem);

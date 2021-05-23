import React, { useContext, useEffect, useState } from 'react';
import Course from './Components/Course';
import { withRouter } from 'react-router-dom';
import Header from './Components/Header';
import './SingleCourseStyles.css';
import { Spinner } from 'react-bootstrap';
import { CoursesContext } from "../../Contexts/CoursesContext";


const SingleCoursePage = ({match}) => {
  const { loading, course, getCourseById } = useContext(CoursesContext);
  const { header_image, header_desc } = {...course.course_page};

  // const [category_id, setcategory_id] = useState(null);

  useEffect(() => {
    if(match.params.id) {
      getCourseById(match.params.id);
    }
  }, [match.params.id]);


  return (
    <>
      {loading && (
        <div className="d-flex justify-content-center align-items-center">
            <Spinner />
        </div>
      )}
      {!course && !loading && (
        <h2 className="not-found text-danger text-center">Course Not Found</h2>
      )}
      {course && !loading ? (
        <>
          <Header header_image={header_image} header_desc={header_desc} name={course.name}/>
          <Course />
        </>
      ) : null}
    </>
  )
}

export default withRouter(SingleCoursePage)

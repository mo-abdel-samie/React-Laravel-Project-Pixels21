import { get } from 'jquery';
import React, { useContext, useEffect, useState } from 'react';
import { Container, Row, Spinner, Col } from 'react-bootstrap';
import { NavLink, withRouter } from 'react-router-dom';
import CoursesItem from '../../../Components/CoursesItem';
import { CoursesContext } from "../../../Contexts/CoursesContext";


const Courses = (props) => {

  const {loading, categories, getCategories, getCategoryCourses} = useContext(CoursesContext);
  
  useEffect(() => {
    getCategories();
    console.log('a');
  }, []);
  
  const [activeCategory, setCategory] = useState('All');

  useEffect(() => {
    getCategoryCourses(activeCategory);
    console.log('b');
    // if (props.location.search && props.location.search.includes("category")) {
    //   console.log('key');
    //   let key = props.location.search.split("category=")[1];
    //   if (key && key.includes("&")) {
    //     key = key.split("&")[0];
    //   }
    //   if (key) {
    //     key = decodeURIComponent(key);
    //     console.log(key);
    //     getCategoryCourses(key);
    //   }
    // }
  }, [activeCategory]);

  return (
    
    <section className="courses py-120">
      <Container>
        <h2 className="courses-title text-center">Unlimited access to more than 1600 courses</h2>

        <Row className="justify-content-center align-items-center">
          {loading && (
            <Col xs={12}>
              <Spinner />
            </Col>
          )}

          {categories.length === 0 && !loading ? (
            <Col xs={12}>
              <h2 className="not-found text-danger text-center"> Categories Not Found </h2>
            </Col>
          ) : (
            <ul className="nav my-4 justify-content-center">
              {categories.map((category, index)=> {
                return (
                  <li key={index} className="nav-item mx-2">
                    <NavLink to={"/courses/"+category} onClick={()=>setCategory(category)} activeClassName="active" className="course-tab text-center d-inline-block rounded-circle">{category}</NavLink>
                  </li>
                );
              })}
            </ul>
          )}
        </Row>

        <CoursesItem allCourses={true}/>

      </Container>
    </section>
  )
}

export default withRouter(Courses);

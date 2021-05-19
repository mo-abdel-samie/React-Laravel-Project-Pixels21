import { get } from 'jquery';
import React, { useContext, useEffect } from 'react';
import { Container, Row, Spinner, Col } from 'react-bootstrap';
import { NavLink } from 'react-router-dom';
import CoursesItem from '../../../Components/CoursesItem';
import { CoursesContext } from "../../../Contexts/CoursesContext";


const Courses = () => {

  const { loading, categories, getCategories } = useContext(CoursesContext);

  useEffect(() => {
    getCategories();
    console.log('a');
  }, []);


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
                    <NavLink to={"/courses/"+category.name} activeClassName="active" className="course-tab text-center d-inline-block rounded-circle">{category.name}</NavLink>
                  </li>
                );
              })}
            </ul>
          )}
        </Row>

        <CoursesItem allCourses='yes'/>

      </Container>
    </section>
  )
}

export default Courses;

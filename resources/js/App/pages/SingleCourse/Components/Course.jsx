import React, {useContext, useEffect} from 'react';
import { Col, Container, Row } from 'react-bootstrap';
import { RiTimer2Line } from 'react-icons/ri';
import { AiOutlineUnlock } from 'react-icons/ai';
import { FaRegArrowAltCircleRight } from 'react-icons/fa';
import { Link, withRouter } from 'react-router-dom';
import { FaFacebookF, FaLinkedinIn, FaTwitter, FaStar } from 'react-icons/fa';
import CoursesItem from '../../../Components/CoursesItem';
import {CoursesContext} from "../../../Contexts/CoursesContext";



function Course(props) {

  const { course, getCoursesByCategoryId } = useContext(CoursesContext);
  const { description,includes_titles, includes_icons, content, share_links_urls, share_links_icons, average_rate, } = {...course.course_page};

   useEffect(() => {
     if(props.match.params.id && props.match.params.id === course.id) {
      getCoursesByCategoryId(course.category_id);
     }
  //   if (props.match.params.id && props.match.params.id === id) {
  //     setIsActive(true);
  //   } else {
  //     setIsActive(false);
  //   }
  }, []);


  return (
    <>
    <section className="course">
      <Container>
        <Row className="justify-content-between w-100 align-items-start py-120">
          <Col lg={8} sm={12}>
            <div className="mb-5 desc">
              <h3 className="title desc-title">Description</h3>
              <p className="text1">{description ? description : null}</p>
            </div>

            <div className="mb-5 content">
              <h3 className="title content-title">Content</h3>
              {content ? content.map((item, index)=> (
               <p key={index} className="text2"><FaRegArrowAltCircleRight className="text-color d-inline"/>{item}</p>
              )) : null}
            </div>
            <div className="mb-5 students-thoughts">
              <h3 className="title students-thoughts-title">What do <span className="text-color">students think</span> about the course?</h3>
              <div className="students-thoughts-rating p-4">
                <Row className="justify-content-between align-items-center w-100">
                  <Col md={4} sm={12}>
                    <h5 className="text1">Average rating: </h5>
                    <span className="text-color">{course.rate ? course.rate : null}</span>
                    <h5 className="text1">Out of 1534 reviews </h5>
                    <span className="text-color">
                      {(()=> {
                        for(let i=0; i<average_rate; i++) {
                          return <FaStar key={i} className="d-inline-block rate-icon" />
                        }
                      })()}
                    </span>
                  </Col>
                </Row>
              </div>

              {/*<div className="student-reviews">*/}
              {/*  <h3 className="title reviews-title"></h3>*/}
              {/*</div>*/}
            </div>
          </Col>

          <Col lg={4} sm={12}>
            <div className="mb-5 inclides">
              <h3 className="title inclides-title">This course includes</h3>
              {includes_icons ? includes_icons.map((icon, index)=> (
                <div key={index}>
                    <p className="text1"><i className={includes_icons[index]+" d-inline"}></i>{includes_titles[index]}</p>
                </div>
              )) : null}
            </div>

            <div className="mb-5 tags">
              <h3 className="title tags-title">Tags</h3>
              <Link to="/" className="tages-link d-inline-block m-1 px-3 py-2 ">Ux</Link>
            </div>

            <div className="mb-5 share">
              <h3 className="title share-title">Share Course</h3>
              {share_links_urls ? share_links_urls.map((link, index)=> (
                  <a key={index} className="" href={share_links_urls[index]}><i className={ share_links_icons[index] +" share-link bg-primary text-light rounded-circle"}></i></a>
              )) : null}
            </div>
          </Col>
        </Row>
      </Container>

      <div className="other-courses py-120">
        <Container>
          <h2 className="mb-4 other-courses-title">Other Courses You May Like</h2>
            {course.category_id ? (
              <CoursesItem />
            ) : null}
        </Container>
      </div>
    </section>
    </>
  )
}

export default withRouter(Course);

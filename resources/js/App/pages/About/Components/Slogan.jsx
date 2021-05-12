import React from 'react'
import unique from '../../../../../../public/images/about-page/Uniqe.png';
import { Container, Row } from 'react-bootstrap';

const Slogan = () => {
  return (
    <Container id="slogan2" className="mt-5">
      <Row className="justify-content-md-between justify-content-between align-items-center text-center" >
        <div className="about-slogan col-lg-4 col-4">
          <h3 className="about-slogan-text">Every Pixel is a knowledge</h3>
        </div>
        <div className="about-slogan-img col-lg-8 col-8">
          <img src={ unique } className="uniqe-image w-100" alt=""/>
        </div>
      </Row>
    </Container>
  )
}
export default Slogan;
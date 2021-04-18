import React, { useState } from 'react'
import { Container, Col, Row, Button } from 'react-bootstrap';



function WorkFlow() {
  const [workFlowTab, setWorkFlowTab] = useState('all');
  const workFlowTabs = ['all', 'CS', 'Power', 'Mechanics'];  
  const data = [
    {
      id: 0,
      tab: "all",
      text: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.",
    },
    {
      id: 1,
      tab: "CS",
      text: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.",
    },
    {
      id: 2,
      tab: "Power",
      text: "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.",
    },
  ];
  
  var currentData = data;
  
  const tabHandler = (tab) => {
    setWorkFlowTab(tab);
    // console.log(currentData);
  }

  if(workFlowTab !== 'all') {currentData = data.filter(datum=> datum.tab === workFlowTab);}
  
  return (
    <Container className="work-flow py" id="work-flow">
      <Row className="justify-content-lg-between justify-content-center">
        <Col lg={3} md={4} className="work-flow-titles">
          <h3 className="work-flow-info-subtitle text-lg-left text-center">How does PIXELS work?</h3>
          <p className="section-title1">Work flow</p>
        </Col>

        <Col lg={8} md={8} sm={12} className="work-flow-tabs">
          <p className="work-flow-desc text-lg-left text-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
          <ul className="nav mt-5 work-flow-tabs">
            {workFlowTabs.map((tab, index) => (
              <li key={index} className="nav-item">
                <Button size="lg" variant="outline-secondary" onClick={()=>tabHandler(tab)} className="work-flow-tab text-center">{++index+'.'+tab}</Button>
              </li>
            ))}
          </ul>

          <div className="work-flow-items">
            <div className="work-flow-item-container">
              <p className="work-flow-item-text p-4 ">{currentData[0] ? currentData[0].text : ''}</p>
            </div>
          </div>

        </Col>
      </Row>
    </Container>

    // <Container className="py">
    //   <svg width={1146.5} height={398.339} viewBox="0 0 1146.5 398.339">
    //     <defs>
    //       <style>
    //         {
    //           ".a,.f{fill:#6a6680;font-family:Montserrat-Medium, Montserrat;font-weight:500;}.a,.c,.e{font-size:16px;}.b{fill:#1e1a33;font-size:36px;}.b,.c{font-family:Montserrat-SemiBold, Montserrat;font-weight:600;}.c{fill:#65b2ff;}.d{fill:none;stroke:rgba(112,112,112,0.3);}.e{fill:#5299e1;font-family:Montserrat-Regular, Montserrat;}.f{font-size:15px;}"
    //         }
    //       </style>
    //     </defs>
    //     <g transform="translate(-107 -1354)">
    //       <text className="a" transform="translate(505 1354)">
    //         <tspan x={0} y={15}>
    //           {
    //             "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget "
    //           }
    //         </tspan>
    //         <tspan x={0} y={40}>
    //           {
    //             "dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, "
    //           }
    //         </tspan>
    //         <tspan x={0} y={65}>
    //           {"nascetur."}
    //         </tspan>
    //       </text>
    //       <text className="b" transform="translate(107 1382)">
    //         <tspan x={0} y={35}>
    //           {"Work flow"}
    //         </tspan>
    //       </text>
    //       <text className="c" transform="translate(107 1354)">
    //         <tspan x={0} y={15}>
    //           {"How does PIXELS work?"}
    //         </tspan>
    //       </text>
    //       <path
    //         className="d"
    //         d="M3857,1500.143h120.764v51.317H4606v199.379H3857Z"
    //         transform="translate(-3353 1)"
    //       />
    //       <text className="e" transform="translate(511 1543)">
    //         <tspan x={0} y={0}>
    //           {"1. Preparing"}
    //         </tspan>
    //       </text>
    //       <text className="e" transform="translate(641.508 1543)">
    //         <tspan x={0} y={0}>
    //           {"2. Design"}
    //         </tspan>
    //       </text>
    //       <text className="e" transform="translate(751 1543)">
    //         <tspan x={0} y={0}>
    //           {"3. Development"}
    //         </tspan>
    //       </text>
    //       <text className="e" transform="translate(914 1543)">
    //         <tspan x={0} y={0}>
    //           {"4. Filling content"}
    //         </tspan>
    //       </text>
    //       <text className="f" transform="translate(507 1602)">
    //         <tspan x={0} y={15}>
    //           {
    //             "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget "
    //           }
    //         </tspan>
    //         <tspan x={0} y={40}>
    //           {
    //             "dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, "
    //           }
    //         </tspan>
    //         <tspan x={0} y={65}>
    //           {
    //             "nascetur. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo "
    //           }
    //         </tspan>
    //         <tspan x={0} y={90}>
    //           {
    //             "ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient "
    //           }
    //         </tspan>
    //         <tspan x={0} y={115}>
    //           {"montes, nascetur."}
    //         </tspan>
    //       </text>
    //     </g>
    //   </svg>
    // </Container>
  )
}

export default WorkFlow

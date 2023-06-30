import { useEffect, useState } from "react";
import { Card, Col, Container, Row } from "react-bootstrap";
import { useParams } from "react-router-dom";

const EmployeeDetails = () => {
    /* ----- State ----- */
    const [employee, setEmployee] = useState({
        name: '',
        email: '',
        position: '',
        birthdate: '',
        address: '',
        skills: {}
    });

    /* ----- Hooks ----- */
    const { id } = useParams();

    useEffect(() => {
        getEmployeeData(id);
    }, []);

    /**
     * Get employee info from API.
     * 
     * @param {string} id 
     */
    const getEmployeeData = async (id) => {
        const url = `http://localhost:8000/api/employees/${id}`;

        const response = await fetch(url);
        const data = await response.json();

        setEmployee(data.data);
    };

    return (
        <Container>
            <h1>{employee.name}</h1>
            <hr />

            <Card className="shadow">
                <Card.Body>
                    <Row>
                        <Col xs={12} md={6}>
                            <Card.Title className="mb-4">
                                <h2>Información del empleado:</h2>
                            </Card.Title>

                            <Card.Text as="div">
                                <ul>
                                    <li>
                                        <span className="fw-semibold">
                                            Correo electrónico: {' '}
                                        </span>
                                        {employee.email}
                                    </li>

                                    <li>
                                        <span className="fw-semibold">
                                            Puesto: {' '}
                                        </span>
                                        {employee.position}
                                    </li>

                                    <li>
                                        <span className="fw-semibold">
                                            Fecha de nacimiento: {' '}
                                        </span>
                                        {employee.birthdate}
                                    </li>

                                    <li>
                                        <span className="fw-semibold">
                                            Domicilio: {' '}
                                        </span>
                                        {employee.address}
                                    </li>

                                    <li>
                                        <span className="fw-semibold">
                                            Skills: {' '}
                                        </span>

                                        <ul>
                                            {Object.entries(employee.skills).map(([key, value], index) => {
                                                return (
                                                    <li key={index}>
                                                        {`${key} - ${value} puntos`}
                                                    </li>
                                                );
                                            })}
                                        </ul>
                                    </li>
                                </ul>
                            </Card.Text>

                            <div className="d-grid">
                                <a
                                    href={`https://maps.google.com/?q=${employee.address}`}
                                    target="_blank"
                                    rel="noreferrer"
                                    className="btn btn-success"
                                >
                                    Ver dirección en Google Maps
                                </a>
                            </div>
                        </Col>

                        <Col xs={12} md={6} className="border d-flex justify-content-center align-items-center my-3">
                            TODO: Google maps image...
                        </Col>
                    </Row>
                </Card.Body>
            </Card>
        </Container>
    );
};
export default EmployeeDetails;
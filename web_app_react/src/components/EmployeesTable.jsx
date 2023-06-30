import { useEffect, useState } from "react";


import { Card, Table } from "react-bootstrap";
import EmployeeItem from "./EmployeeItem";


const EmployeesTable = () => {
    /* ----- State ----- */
    const [employees, setEmployees] = useState([]);
    
    /* ----- Hooks ----- */
    useEffect(() => {
        getData();
    }, []);


    /**
     * Get data from API.
     */
    const getData = async () => {
        const response = await fetch(`http://localhost:8000/api/employees`);
        const data = await response.json();

        setEmployees(data.data.employees);
    };

    return (
        <Card className="shadow">
            <Card.Header>
                <h3>Lista de empleados</h3>
            </Card.Header>

            <Card.Body>
                <Table striped className="align-middle">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Puesto</th>
                            <th>Skills</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        {employees.map((item, index) => {
                            return (
                                <EmployeeItem
                                    key={index}
                                    employee={item}
                                />
                            );
                        })}
                    </tbody>
                </Table>
            </Card.Body>
        </Card>
    );
};
export default EmployeesTable;
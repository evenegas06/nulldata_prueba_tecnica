import { Container } from "react-bootstrap";
import EmployeesTable from "../components/EmployeesTable";

const Home = () => {
    return (
        <Container>
            <h1>Eduardo Venegas | Prueba técnica</h1>
            <hr />

            <EmployeesTable />
        </Container>
    );
};
export default Home;
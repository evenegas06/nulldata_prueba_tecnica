import { Button } from "react-bootstrap";
import { Link } from "react-router-dom";

const EmployeeItem = ({ employee }) => {

    const { id, name, email, position, skills } = employee;

    return (
        <tr>
            <td>{name}</td>
            <td>{email}</td>
            <td>{position}</td>
            <td>
                <ul>
                    {Object.entries(skills).map(([key, value], index) => {
                        return (
                            <li key={index}>
                                {`${key} - ${value} puntos`}
                            </li>
                        );
                    })}
                </ul>
            </td>
            <td>
                <Link
                    to={`/employee/${id}`}
                >
                    <Button
                        variant="outline-success"
                        size="sm"
                    >
                        Ver mas detalles
                    </Button>
                </Link>
            </td>
        </tr>
    );
};
export default EmployeeItem;
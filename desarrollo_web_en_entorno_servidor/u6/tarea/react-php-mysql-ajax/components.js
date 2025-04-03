class Clientes extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      items: []
    };
  }

  componentDidMount() {
    fetch("list.customers.php")
      .then(res => res.json())
      .then(
        (result) => {
          this.setState({
            items: result.items
          });
        }
      )
  }

  render() {
    const {items} = this.state;
    return (
      <ul>
        {items.map(item => (
          <li key={item.id}>
            Fecha registro: {item.date_register} <br />
            Nombres: {item.name} <br />
            Telefono:{item.phone}
          </li>
        ))}
      </ul>
    );
  }
}

function App() {
  return (
    <div>
      <Clientes />
    </div>
  );
}

ReactDOM.render(
  <App />,
  document.getElementById('root')
);

playCell = () => {
    return "<td><button>Play</button></td>";
}

chainCell = (chainID) => {
    return "<td>" + chainID + "</td>";
}

wordCell = (word) => {
    return "<td>" + word + "</td>";
}

updateCell = (chainID) => {
    return "<td><form action='./updatechain.php' method='post'><input type='submit' id='" + chainID +"' value='Update'></form></td>";
}

deleteCell = (chainID) => {
    return "<td><button>Delete</button></td>";
}
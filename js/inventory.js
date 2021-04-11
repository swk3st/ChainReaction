playCell = () => {
    return "<td><button>Play</button></td>";
}

chainCell = (chainID) => {
    return "<td>" + chainID + "</td>";
}

wordCell = (word) => {
    return "<td>" + word + "</td>";
}

updateCell = (chainID, words) => {
    let href = "./updatechain.php?";
    href += "chainID=" + chainID;
    for (let i = 1; i <= words.length; i++) {
        href += "&word" + i + "=" + words[i - 1];
    }
    return "<td><a href='" + href + "'><button>Update</button></a></td>";
}

deleteCell = (chainID) => {
    let href = "../../chaininventory.php?action=remove";
    href += "&chainID=" + chainID;
    return "<td><a href='" + href + "'><button>Delete</button></a></td>";
}
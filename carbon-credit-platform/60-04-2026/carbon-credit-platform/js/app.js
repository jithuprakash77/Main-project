let web3;
let contract;

const contractAddress = "0x5e682282D8313fEF87021Ca3d6f30A02dADEE93a";

// paste ABI here
const abi = [
  {
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_userId",
        "type": "uint256"
      },
      {
        "internalType": "uint256",
        "name": "_credits",
        "type": "uint256"
      },
      {
        "internalType": "string",
        "name": "_metadata",
        "type": "string"
      }
    ],
    "name": "buyCredit",
    "outputs": [],
    "stateMutability": "nonpayable",
    "type": "function"
  },
  {
    "anonymous": false,
    "inputs": [
      {
        "indexed": false,
        "internalType": "address",
        "name": "buyer",
        "type": "address"
      },
      {
        "indexed": false,
        "internalType": "uint256",
        "name": "userId",
        "type": "uint256"
      },
      {
        "indexed": false,
        "internalType": "uint256",
        "name": "credits",
        "type": "uint256"
      },
      {
        "indexed": false,
        "internalType": "uint256",
        "name": "timestamp",
        "type": "uint256"
      },
      {
        "indexed": false,
        "internalType": "string",
        "name": "metadata",
        "type": "string"
      }
    ],
    "name": "CreditPurchased",
    "type": "event"
  },
  {
    "inputs": [
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      }
    ],
    "name": "transactions",
    "outputs": [
      {
        "internalType": "address",
        "name": "buyer",
        "type": "address"
      },
      {
        "internalType": "uint256",
        "name": "userId",
        "type": "uint256"
      },
      {
        "internalType": "uint256",
        "name": "credits",
        "type": "uint256"
      },
      {
        "internalType": "uint256",
        "name": "timestamp",
        "type": "uint256"
      },
      {
        "internalType": "string",
        "name": "metadata",
        "type": "string"
      }
    ],
    "stateMutability": "view",
    "type": "function"
  }
];

async function init() {

    if (window.ethereum) {
        web3 = new Web3(window.ethereum);
        await ethereum.request({ method: 'eth_requestAccounts' });

        contract = new web3.eth.Contract(abi, contractAddress);
        console.log("Methods:", contract.methods);
    } else {
        alert("Install MetaMask");
    }
}

async function buyCredit(id, credits){

    await init();

    const accounts = await web3.eth.getAccounts();
    const buyer = accounts[0];

    const userId = id; // or session user id if needed
    const metadata = "Marketplace purchase ID: " + id;

    try{
        const tx = await contract.methods
            .buyCredit(userId, credits, metadata)
            .send({
                from: buyer,
                gas: 3000000
            });

        console.log("TX HASH:", tx.transactionHash);

        // send to PHP
        fetch("buy.php?id=" + id + "&tx=" + tx.transactionHash)
        .then(() => location.reload());

    }catch(err){
        console.error(err);
        alert("Transaction failed: " + err.message);
    }
}
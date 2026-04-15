let web3;
let contract;

const contractAddress = "0x3E3fCdD10486ab22bFe1F5F16635767CB4E49efb";

// ✅ PASTE YOUR ABI HERE
const abi =[
  {
    "inputs": [
      {
        "internalType": "uint256",
        "name": "_listingId",
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
        "name": "listingId",
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
        "name": "index",
        "type": "uint256"
      }
    ],
    "name": "getTransaction",
    "outputs": [
      {
        "internalType": "address",
        "name": "",
        "type": "address"
      },
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      },
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      },
      {
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
      },
      {
        "internalType": "string",
        "name": "",
        "type": "string"
      }
    ],
    "stateMutability": "view",
    "type": "function"
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
        "name": "listingId",
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

async function buyCredit(id, quantity){

    if(quantity <= 0){
        alert("Enter valid credits");
        return;
    }

    await init();

    const accounts = await web3.eth.getAccounts();

    try{
        const tx = await contract.methods
            .buyCredit(id, quantity, "Partial purchase")
            .send({
                from: accounts[0],
                gas: 3000000
            });

        console.log("TX:", tx.transactionHash);

        fetch("buy.php?id=" + id + "&qty=" + quantity + "&tx=" + tx.transactionHash)
        .then(() => {
            window.location.href = "dashboard.php";
        });

    }catch(err){
        console.error(err);
        alert("Transaction failed");
    }
}
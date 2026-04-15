const express = require('express');
const Web3 = require('web3');
const cors = require('cors');

const app = express();
app.use(cors());

const web3 = new Web3("http://127.0.0.1:7545");

// 🔴 PASTE YOUR CONTRACT ABI HERE
const contractABI = [ /* paste from Remix */ ];

// 🔴 PASTE YOUR CONTRACT ADDRESS HERE
const contractAddress = "YOUR_CONTRACT_ADDRESS";

const contract = new web3.eth.Contract(contractABI, contractAddress);

// SELL API
app.get("/sell/:seller/:amount", async (req,res)=>{
    const accounts = await web3.eth.getAccounts();

    await contract.methods.sellCredits(
        req.params.seller,
        req.params.amount
    ).send({from: accounts[0]});

    res.send("Sell Transaction Done");
});

// BUY API
app.get("/buy/:buyer/:seller/:amount", async (req,res)=>{
    const accounts = await web3.eth.getAccounts();

    await contract.methods.buyCredits(
        req.params.buyer,
        req.params.seller,
        req.params.amount
    ).send({from: accounts[0]});

    res.send("Buy Transaction Done");
});

// CHECK CREDITS
app.get("/credits/:address", async (req,res)=>{
    let credits = await contract.methods.credits(req.params.address).call();
    res.json({credits});
});

app.listen(3000, ()=>{
    console.log("🚀 Blockchain API running on http://localhost:3000");
});
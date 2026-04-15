// SPDX-License-Identifier: MIT
pragma solidity ^0.8.0;

contract CarbonCredit {

    struct Transaction {
        address buyer;
        uint listingId;
        uint credits;
        uint timestamp;
        string metadata;
    }

    Transaction[] public transactions;

    event CreditPurchased(
        address buyer,
        uint listingId,
        uint credits,
        uint timestamp,
        string metadata
    );

    function buyCredit(
        uint _listingId,
        uint _credits,
        string memory _metadata
    ) public {

        require(_credits > 0, "Invalid credit amount");

        transactions.push(Transaction(
            msg.sender,
            _listingId,
            _credits,
            block.timestamp,
            _metadata
        ));

        emit CreditPurchased(
            msg.sender,
            _listingId,
            _credits,
            block.timestamp,
            _metadata
        );
    }

    function getTransaction(uint index) public view returns (
        address, uint, uint, uint, string memory
    ){
        Transaction memory t = transactions[index];
        return (
            t.buyer,
            t.listingId,
            t.credits,
            t.timestamp,
            t.metadata
        );
    }
}
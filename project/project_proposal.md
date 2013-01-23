Project proposal for WebLAMP 442

VirtualPersistAPI
==

What?
--

Persistent storage lookup API for access over http, catering to virtual worlds.

Why?
--

Second Life is a virtual world. It lets you write scripts, and it lets you make http requests, but it does not provide a method for persistent storage of data.

This API will be an open-source codebase that anyone can use as a persistent data store.

Basically...
--

This will be a system for storing arbitrary small blobs of text-based data.

Users are represented by UUIDs.

Using http requests, users can POST and GET and DELETE data to the store based on a key->data model.

Second Life imposes a 2k limit on data POSTed through requests, so that's our largest blob size.

I want to learn Symfony2 and Doctrine, so that's the framework of choice.

Limitations and Weirdnesses:
--

The final product will involve Second Life scripts in Linden Scripting Language (LSL), which is outside the class scope.

The class project and its tests will be a fairly large subset of the total, doing authentication and storage, without the LSL-flavored parts.

The class project could implement OAuth or other sophisticated authentication systems as required, although the final product will likely not use them. Implementing OAuth in LSL is not viable at the moment.
